<?php

namespace Tests\Browser;

use App\Models\Car;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_admin_can_login_manage_cars_and_logout()
    {
        $this->browse(function (Browser $browser) {
            // 1. Visit Login Page
            $browser->visit('/en/admin/login')
                    ->assertSee('Morocco Fleet Manager Login')
                    ->type('username', 'admin')
                    ->type('password', '123456')
                    ->click('button[type="submit"]')
                    ->pause(1500)
                    ->assertPathIs('/en/admin')
                    ->assertSee('Car Airport Morocco - Fleet Manager');

            // 2. Add a new car
            $browser->type('brand', 'Hyundai')
                    ->type('model', 'i10')
                    ->select('category', 'Economy')
                    ->type('seats', '5')
                    ->select('transmission', 'Manual')
                    ->type('quantity', '3')
                    ->type('base_price', '250')
                    ->check('ac')
                    ->click('form[action$="/admin/cars"] button[type="submit"]')
                    ->pause(1500)
                    ->assertSee('Hyundai i10')
                    ->assertSee('Economy')
                    ->assertSee('250 DH');

            // Verify database
            $this->assertDatabaseHas('cars', [
                'brand' => 'Hyundai',
                'model' => 'i10',
                'base_price' => 250.00,
                'ac' => 1,
            ]);

            // 3. Edit car operating costs
            $car = Car::where('brand', 'Hyundai')->first();
            $browser->click('#btn-edit-car-' . $car->id)
                    ->pause(1000)
                    ->assertVisible('#editCarModal')
                    // update lease cost and fuel cost
                    ->type('#edit_loan_cost', '3000')
                    ->type('#edit_fuel_cost', '500')
                    ->click('#editCarForm button[type="submit"]')
                    ->pause(1500);

            $this->assertDatabaseHas('cars', [
                'id' => $car->id,
                'loan_cost' => 3000.00,
                'fuel_cost' => 500.00,
            ]);

            // 4. Log out
            $browser->press('Logout')
                    ->pause(1500)
                    ->assertPathIs('/en/admin/login');
        });
    }
}
