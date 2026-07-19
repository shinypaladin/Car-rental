<?php

namespace Tests\Unit;

use App\Helpers\PricingEngine;
use App\Models\Car;
use App\Models\SeasonalPrice;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PricingEngineTest extends TestCase
{
    use RefreshDatabase;

    private Car $car;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a standard car for pricing tests
        $this->car = Car::create([
            'brand' => 'Test',
            'model' => 'Car',
            'category' => 'Economy',
            'seats' => 5,
            'transmission' => 'manual',
            'ac' => true,
            'quantity' => 1,
            'allow_overbooking' => false,
            'base_price' => 300.0,
            'image_path' => '/images/default.jpg',
        ]);
    }

    public function test_calculate_price_uses_base_price_when_no_rules_exist()
    {
        $pickup = Carbon::parse('2026-07-20 10:00:00');
        $return = Carbon::parse('2026-07-23 10:00:00'); // 3 days

        $result = PricingEngine::calculatePrice($this->car, $pickup, $return);

        $this->assertEquals(900.0, $result['total_price']);
        $this->assertEquals(3, $result['days']);
        $this->assertEquals(300.0, $result['average_daily_rate']);
    }

    public function test_calculate_price_applies_car_specific_flat_override_first()
    {
        // 1. Car-specific Flat Override (priority 1)
        SeasonalPrice::create([
            'car_id' => $this->car->id,
            'name' => 'Specific Flat Override',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'flat_rate',
            'value' => 500.0,
        ]);

        // 2. Global Flat Override (priority 2)
        SeasonalPrice::create([
            'car_id' => null,
            'name' => 'Global Flat Override',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'flat_rate',
            'value' => 450.0,
        ]);

        $pickup = Carbon::parse('2026-07-20 10:00:00');
        $return = Carbon::parse('2026-07-23 10:00:00'); // 3 days

        $result = PricingEngine::calculatePrice($this->car, $pickup, $return);

        // Should use priority 1 (Specific Flat Override = 500)
        $this->assertEquals(1500.0, $result['total_price']);
        $this->assertEquals(500.0, $result['average_daily_rate']);
    }

    public function test_calculate_price_applies_global_flat_override_when_specific_absent()
    {
        // 2. Global Flat Override (priority 2)
        SeasonalPrice::create([
            'car_id' => null,
            'name' => 'Global Flat Override',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'flat_rate',
            'value' => 400.0,
        ]);

        // 3. Car-specific Percentage Adjustment (priority 3)
        SeasonalPrice::create([
            'car_id' => $this->car->id,
            'name' => 'Specific Percentage',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'percentage',
            'value' => 1.5,
        ]);

        $pickup = Carbon::parse('2026-07-20 10:00:00');
        $return = Carbon::parse('2026-07-23 10:00:00'); // 3 days

        $result = PricingEngine::calculatePrice($this->car, $pickup, $return);

        // Should use priority 2 (Global Flat Override = 400)
        $this->assertEquals(1200.0, $result['total_price']);
        $this->assertEquals(400.0, $result['average_daily_rate']);
    }

    public function test_calculate_price_applies_specific_percentage_when_flats_absent()
    {
        // 3. Car-specific Percentage Adjustment (priority 3)
        SeasonalPrice::create([
            'car_id' => $this->car->id,
            'name' => 'Specific Percentage',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'percentage',
            'value' => 1.2, // +20% (multiplier 1.2)
        ]);

        // 4. Global Percentage Adjustment (priority 4)
        SeasonalPrice::create([
            'car_id' => null,
            'name' => 'Global Percentage',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'percentage',
            'value' => 1.5,
        ]);

        $pickup = Carbon::parse('2026-07-20 10:00:00');
        $return = Carbon::parse('2026-07-23 10:00:00'); // 3 days

        $result = PricingEngine::calculatePrice($this->car, $pickup, $return);

        // Should use priority 3 (Specific Percentage = base * 1.2 = 300 * 1.2 = 360)
        $this->assertEquals(1080.0, $result['total_price']);
        $this->assertEquals(360.0, $result['average_daily_rate']);
    }

    public function test_calculate_price_applies_global_percentage_when_higher_priorities_absent()
    {
        // 4. Global Percentage Adjustment (priority 4)
        SeasonalPrice::create([
            'car_id' => null,
            'name' => 'Global Percentage',
            'start_date' => '2026-07-20',
            'end_date' => '2026-07-23',
            'adjustment_type' => 'percentage',
            'value' => 1.1, // +10% (multiplier 1.1)
        ]);

        $pickup = Carbon::parse('2026-07-20 10:00:00');
        $return = Carbon::parse('2026-07-23 10:00:00'); // 3 days

        $result = PricingEngine::calculatePrice($this->car, $pickup, $return);

        // Should use priority 4 (Global Percentage = base * 1.1 = 300 * 1.1 = 330)
        $this->assertEquals(990.0, $result['total_price']);
        $this->assertEquals(330.0, $result['average_daily_rate']);
    }
}
