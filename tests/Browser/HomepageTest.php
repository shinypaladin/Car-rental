<?php

namespace Tests\Browser;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    use DatabaseMigrations;

    private Car $car;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test car in the test database
        $this->car = Car::create([
            'brand' => 'Dacia',
            'model' => 'Duster',
            'category' => 'SUV',
            'seats' => 5,
            'transmission' => 'Manual',
            'ac' => true,
            'quantity' => 2,
            'allow_overbooking' => false,
            'base_price' => 450.00,
            'image_path' => '/images/dacia_duster.jpg',
        ]);
    }

    public function test_homepage_loads_and_displays_cars()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/en')
                    ->assertSee('Car Airport Morocco')
                    ->assertSee('Dacia Duster')
                    ->select('#currency-select', 'MAD')
                    ->assertSee('450 DH')
                    ->select('#currency-select', 'EUR')
                    ->assertSee('41 €');
        });
    }

    public function test_language_switcher_works()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/en')
                    ->assertSee('My Booking')
                    ->select('#lang-select', 'fr')
                    ->pause(1000)
                    ->assertPathBeginsWith('/fr')
                    ->assertSee('Ma Réservation');
        });
    }

    public function test_booking_submission_succeeds()
    {
        $this->browse(function (Browser $browser) {
            $pickupDate = date('Y-m-d', strtotime('+2 days'));
            $returnDate = date('Y-m-d', strtotime('+5 days'));

            $browser->visit('/en')
                    ->script([
                        "document.getElementById('pickup_date').value = '$pickupDate';",
                        "document.getElementById('return_date').value = '$returnDate';"
                    ]);

            $browser->click('button[type="submit"]') // Submit search query
                    ->pause(1000)
                    // Click on the book button of the Duster car
                    ->click('.book-btn')
                    ->pause(1000)
                    // Modal should be visible
                    ->assertVisible('#bookingModal')
                    // Fill booking modal details
                    ->type('customer_name', 'Browser Test User')
                    ->type('customer_email', 'browser.test@example.com')
                    ->type('customer_phone', '+212600988632')
                    // Click the confirm/save button inside the modal
                    ->press('Confirm Reservation Request')
                    ->pause(2000)
                    // Modal should submit and redirect to home with success message
                    ->assertSee('Booking requested successfully!');
        });
    }
}
