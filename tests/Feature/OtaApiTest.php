<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Booking;
use App\Models\ApiKey;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OtaApiTest extends TestCase
{
    use RefreshDatabase;

    private Car $car;
    private ApiKey $apiKey;

    protected function setUp(): void
    {
        parent::setUp();

        $this->car = Car::create([
            'brand' => 'Dacia',
            'model' => 'Logan',
            'category' => 'Economy',
            'seats' => 5,
            'transmission' => 'Manual',
            'ac' => true,
            'quantity' => 2,
            'allow_overbooking' => false,
            'base_price' => 300.00,
            'image_path' => '/images/dacia_logan.jpg',
        ]);

        $this->apiKey = ApiKey::create([
            'name' => 'Test Partner',
            'key' => 'test_secret_token_123',
            'active' => true,
        ]);
    }

    public function test_rejects_request_without_api_key()
    {
        $response = $this->getJson('/api/availability');
        $response->assertStatus(401);
        $response->assertJson([
            'status' => 'error',
            'message' => 'API Key is missing. Please provide the X-API-KEY header.'
        ]);
    }

    public function test_rejects_request_with_invalid_api_key()
    {
        $response = $this->getJson('/api/availability', [
            'X-API-KEY' => 'wrong_key_here'
        ]);
        $response->assertStatus(401);
        $response->assertJson([
            'status' => 'error',
            'message' => 'Invalid or inactive API Key.'
        ]);
    }

    public function test_json_availability_endpoint()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->getJson("/api/availability?pickup_date={$pickup}&return_date={$return}", [
            'X-API-KEY' => 'test_secret_token_123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'pickup_location',
            'vehicles' => [
                '*' => [
                    'vehicle_id',
                    'brand',
                    'model',
                    'total_price',
                    'currency'
                ]
            ]
        ]);

        $this->assertEquals('Dacia', $response->json('vehicles.0.brand'));
        $this->assertEquals(900.0, $response->json('vehicles.0.total_price'));
    }

    public function test_xml_availability_endpoint()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->get("/api/availability?pickup_date={$pickup}&return_date={$return}&format=xml", [
            'X-API-KEY' => 'test_secret_token_123'
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $this->assertStringContainsString('<VehAvailRateRS>', $response->getContent());
        $this->assertStringContainsString('<brand>Dacia</brand>', $response->getContent());
        $this->assertStringContainsString('<total_price>900</total_price>', $response->getContent());
    }

    public function test_json_booking_creation_endpoint()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->postJson('/api/booking', [
            'vehicle_id' => $this->car->id,
            'customer_name' => 'OTA Guest',
            'customer_email' => 'guest@booking.com',
            'customer_phone' => '+33612345678',
            'pickup_date' => $pickup,
            'return_date' => $return,
            'source' => 'booking.com'
        ], [
            'X-API-KEY' => 'test_secret_token_123'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'reservation_status' => 'Confirmed',
            'total_price' => 900.0,
            'currency' => 'MAD'
        ]);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'OTA Guest',
            'source' => 'booking.com',
            'total_price' => 900.0
        ]);
    }

    public function test_xml_booking_creation_endpoint()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
        <VehBookRQ>
            <vehicle_id>' . $this->car->id . '</vehicle_id>
            <customer_name>XML Partner Guest</customer_name>
            <customer_email>xmlguest@hertz.com</customer_email>
            <customer_phone>+442079460921</customer_phone>
            <pickup_date>' . $pickup . '</pickup_date>
            <return_date>' . $return . '</return_date>
            <source>hertz</source>
        </VehBookRQ>';

        $server = [
            'CONTENT_TYPE' => 'application/xml',
            'HTTP_ACCEPT' => 'application/xml',
            'HTTP_X_API_KEY' => 'test_secret_token_123',
        ];

        $response = $this->call('POST', '/api/booking', [], [], [], $server, $xmlData);

        if ($response->getStatusCode() !== 200) {
            dump($response->getContent());
        }

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $this->assertStringContainsString('<reservation_status>Confirmed</reservation_status>', $response->getContent());

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'XML Partner Guest',
            'source' => 'hertz',
            'total_price' => 900.0
        ]);
    }

    public function test_applies_discount_to_api_response()
    {
        $discountKey = ApiKey::create([
            'name' => 'Discounted Partner',
            'key' => 'discounted_secret_key_123',
            'active' => true,
            'discount_percent' => 15.00, // 15% discount
        ]);

        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->withHeaders([
            'X-API-KEY' => 'discounted_secret_key_123',
        ])->getJson("/api/availability?pickup_date={$pickup}&return_date={$return}");

        $response->assertStatus(200);
        $vehicles = $response->json('vehicles');

        $this->assertCount(1, $vehicles);
        // Base rate is 300.00. 15% discount = 255.00
        $this->assertEquals(255, $vehicles[0]['rate_per_day']);
        // Total price for 3 days = 3 * 300 = 900. 15% discount = 765.00
        $this->assertEquals(765, $vehicles[0]['total_price']);
    }

    public function test_can_update_api_key()
    {
        $apiKey = ApiKey::create([
            'name' => 'Old Name',
            'key' => 'token_123',
            'active' => true,
            'discount_percent' => 5.00
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->post("/en/admin/api-keys/update/{$apiKey->id}", [
                'name' => 'New Name',
                'discount_percent' => 20.00
            ]);

        $response->assertStatus(302);
        
        $apiKey->refresh();
        $this->assertEquals('New Name', $apiKey->name);
        $this->assertEquals(20.00, $apiKey->discount_percent);
    }
}
