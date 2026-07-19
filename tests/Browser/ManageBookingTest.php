<?php

namespace Tests\Browser;

use App\Models\Car;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageBookingTest extends DuskTestCase
{
    use DatabaseMigrations;

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
            'quantity' => 1,
            'allow_overbooking' => false,
            'base_price' => 300.00,
            'image_path' => '/images/dacia_logan.jpg',
        ]);

        $this->booking = Booking::create([
            'booking_reference' => 'CAM-DUSK11',
            'car_id' => $this->car->id,
            'customer_name' => 'Dusk Client',
            'customer_email' => 'dusk.client@example.com',
            'customer_phone' => '+212600111111',
            'pickup_location' => 'Marrakech Airport (RAK)',
            'return_location' => 'Marrakech Airport (RAK)',
            'pickup_datetime' => Carbon::now()->addDays(2),
            'return_datetime' => Carbon::now()->addDays(4),
            'total_price' => 600.00,
            'status' => 'pending',
            'source' => 'website',
        ]);
    }

    public function test_user_can_retrieve_and_modify_booking()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/en')
                    ->select('#currency-select', 'MAD')
                    // Click My Booking in nav
                    ->clickLink('My Booking')
                    ->pause(1000)
                    ->assertVisible('#manageBookingModal')
                    // Type lookup reference
                    ->type('#lookupReference', 'CAM-DUSK11')
                    ->click('button[onclick="retrieveBookingDetails()"]')
                    ->pause(2000)
                    // It should load details and transition to edit section
                    ->assertVisible('#bookingEditSection')
                    ->assertValue('#editCustomerName', 'Dusk Client');

            $pickupVal = Carbon::now()->addDays(2)->format('Y-m-d\TH:i');
            $returnVal = Carbon::now()->addDays(5)->format('Y-m-d\TH:i');

            $browser->script([
                "document.getElementById('editPickupDatetime').value = '$pickupVal';",
                "document.getElementById('editReturnDatetime').value = '$returnVal';",
                "triggerPriceRecalculation();"
            ]);

            $browser->pause(3000)
                    // Check pricing updated
                    ->assertSeeIn('#editEstimatedPrice', '900')
                    // Change name
                    ->type('#editCustomerName', 'Dusk Client Updated')
                    // Submit modifications
                    ->click('#savePublicEditBtn')
                    ->pause(3000)
                    // Modal should close or show success message, page reloading will occur
                    ->assertDontSee('#manageBookingModal');

            // Verify in database
            $this->assertDatabaseHas('bookings', [
                'booking_reference' => 'CAM-DUSK11',
                'customer_name' => 'Dusk Client Updated',
                'total_price' => 900.00,
            ]);
        });
    }
}
