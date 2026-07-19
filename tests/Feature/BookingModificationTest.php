<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingModificationTest extends TestCase
{
    use RefreshDatabase;

    private Car $car;
    private Booking $booking;

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
            'quantity' => 1, // Only 1 vehicle in fleet
            'allow_overbooking' => false,
            'base_price' => 300.00,
            'image_path' => '/images/dacia_logan.jpg',
        ]);

        $this->booking = Booking::create([
            'booking_reference' => 'CAM-TEST12',
            'car_id' => $this->car->id,
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'customer_phone' => '+212600000000',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'return_location' => 'Marrakech Airport (RAK)',
            'pickup_datetime' => Carbon::now()->addDays(2),
            'return_datetime' => Carbon::now()->addDays(4),
            'total_price' => 600.00,
            'status' => 'pending',
            'source' => 'website',
        ]);
    }

    public function test_admin_can_update_booking()
    {
        $response = $this->withSession(['admin_logged_in' => true])
            ->post('/en/admin/bookings/update/' . $this->booking->id, [
                'car_id' => $this->car->id,
                'customer_name' => 'Jane Doe',
                'customer_email' => 'jane@example.com',
                'customer_phone' => '+212611111111',
                'pickup_location' => 'Casablanca Airport (CMN)',
                'return_location' => 'Casablanca Airport (CMN)',
                'pickup_datetime' => Carbon::now()->addDays(2)->format('Y-m-d H:i'),
                'return_datetime' => Carbon::now()->addDays(4)->format('Y-m-d H:i'),
                'total_price' => 700.00, // Admin override price
                'status' => 'confirmed',
                'source' => 'whatsapp',
            ]);

        $response->assertRedirect('/en/admin');
        
        $this->assertDatabaseHas('bookings', [
            'id' => $this->booking->id,
            'customer_name' => 'Jane Doe',
            'customer_email' => 'jane@example.com',
            'pickup_location' => 'Casablanca Airport (CMN)',
            'total_price' => 700.00,
            'status' => 'confirmed',
            'source' => 'whatsapp',
        ]);
    }

    public function test_public_user_can_retrieve_booking_by_reference()
    {
        $response = $this->get('/en/booking/retrieve?reference=CAM-TEST12');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'booking' => [
                'booking_reference' => 'CAM-TEST12',
                'customer_name' => 'John Doe',
            ]
        ]);
    }

    public function test_public_user_can_update_booking_which_recalculates_price()
    {
        // Extend dates: now 3 days instead of 2. Estimated price: 3 * 300 = 900
        $newPickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $newReturn = Carbon::now()->addDays(5)->format('Y-m-d H:i');

        $response = $this->postJson('/en/booking/update-public', [
            'reference' => 'CAM-TEST12',
            'car_id' => $this->car->id,
            'customer_name' => 'John Updated',
            'customer_email' => 'john.updated@example.com',
            'customer_phone' => '+212600000000',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'pickup_datetime' => $newPickup,
            'return_datetime' => $newReturn,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'total_price' => 900.00, // Re-evaluated dynamically
        ]);

        $this->assertDatabaseHas('bookings', [
            'booking_reference' => 'CAM-TEST12',
            'customer_name' => 'John Updated',
            'total_price' => 900.00,
        ]);
    }

    public function test_public_user_cannot_update_booking_if_vehicle_is_fully_booked()
    {
        // Create another car (e.g. Mercedes Vito)
        $vito = Car::create([
            'brand' => 'Mercedes',
            'model' => 'Vito',
            'category' => 'Van',
            'seats' => 9,
            'transmission' => 'Automatic',
            'ac' => true,
            'quantity' => 1, // Only 1 Vito in fleet
            'allow_overbooking' => false,
            'base_price' => 900.00,
        ]);

        // Create an overlapping booking for the Vito car
        $vitoPickup = Carbon::now()->addDays(5);
        $vitoReturn = Carbon::now()->addDays(7);

        Booking::create([
            'booking_reference' => 'CAM-VITO88',
            'car_id' => $vito->id,
            'customer_name' => 'Vito Guest',
            'customer_phone' => '12345678',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'return_location' => 'Marrakech Airport (RAK)',
            'pickup_datetime' => $vitoPickup,
            'return_datetime' => $vitoReturn,
            'total_price' => 1800.00,
            'status' => 'confirmed',
            'source' => 'website',
        ]);

        // Now, try to modify our original booking (CAM-TEST12) to switch to the Vito car
        // during those same overlapping dates. This should fail because the Vito is fully booked!
        $response = $this->postJson('/en/booking/update-public', [
            'reference' => 'CAM-TEST12',
            'car_id' => $vito->id,
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'customer_phone' => '+212600000000',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'pickup_datetime' => $vitoPickup->format('Y-m-d H:i'),
            'return_datetime' => $vitoReturn->format('Y-m-d H:i'),
        ]);

        // Should return a 409 Conflict status with error message
        $response->assertStatus(409);
        $response->assertJson([
            'status' => 'error',
            'message' => 'Sorry, this vehicle is not available for the selected dates.'
        ]);
    }

    public function test_public_user_can_calculate_price_with_extras()
    {
        $pickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $return = Carbon::now()->addDays(4)->format('Y-m-d H:i'); // 2 days

        $response = $this->get("/en/booking/recalculate?car_id={$this->car->id}&pickup_datetime={$pickup}&return_datetime={$return}&extras=insurance,gps");

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'total_price' => 1000.00,
            'days' => 2,
        ]);
    }

    public function test_public_user_can_update_booking_with_extras_and_return_location()
    {
        $newPickup = Carbon::now()->addDays(2)->format('Y-m-d H:i');
        $newReturn = Carbon::now()->addDays(4)->format('Y-m-d H:i'); // 2 days

        $response = $this->postJson('/en/booking/update-public', [
            'reference' => 'CAM-TEST12',
            'car_id' => $this->car->id,
            'customer_name' => 'John Extras',
            'customer_email' => 'john.extras@example.com',
            'customer_phone' => '+212600000000',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'return_location' => 'Casablanca Airport (CMN)',
            'pickup_datetime' => $newPickup,
            'return_datetime' => $newReturn,
            'extras' => ['insurance', 'gps'],
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'total_price' => 1000.00,
        ]);

        $this->assertDatabaseHas('bookings', [
            'booking_reference' => 'CAM-TEST12',
            'customer_name' => 'John Extras',
            'return_location' => 'Casablanca Airport (CMN)',
            'total_price' => 1000.00,
        ]);

        $booking = Booking::where('booking_reference', 'CAM-TEST12')->first();
        $this->assertEquals(['insurance', 'gps'], $booking->extras);
    }
}
