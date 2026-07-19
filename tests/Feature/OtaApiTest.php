<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OtaApiTest extends TestCase
{
    use RefreshDatabase;

    private Car $car;

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
    }

    public function test_json_availability_endpoint()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->getJson("/api/availability?pickup_date={$pickup}&return_date={$return}");

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

        $response = $this->get("/api/availability?pickup_date={$pickup}&return_date={$return}&format=xml");

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
}
