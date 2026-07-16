<?php

namespace App\Helpers;

use App\Models\Car;
use App\Models\SeasonalPrice;
use Carbon\Carbon;

class PricingEngine
{
    /**
     * Calculate total price for a car over a date range.
     * Handles seasonal pricing per day.
     */
    public static function calculatePrice(Car $car, $startDateTime, $endDateTime)
    {
        $start = Carbon::parse($startDateTime);
        $end = Carbon::parse($endDateTime);
        
        // Count total days (minimum 1 day)
        $days = max(1, ceil($start->diffInHours($end) / 24));
        
        $totalPrice = 0;
        
        // Fetch all active seasonal prices that overlap with the range
        $seasonalPrices = SeasonalPrice::where(function ($query) use ($start, $end) {
            $query->whereBetween('start_date', [$start->toDateString(), $end->toDateString()])
                  ->orWhereBetween('end_date', [$start->toDateString(), $end->toDateString()])
                  ->orWhere(function ($q2) use ($start, $end) {
                      $q2->where('start_date', '<=', $start->toDateString())
                         ->where('end_date', '>=', $end->toDateString());
                  });
        })
        ->where(function ($query) use ($car) {
            $query->whereNull('car_id') // Global
                  ->orWhere('car_id', $car->id); // Car-specific
        })
        ->get();

        // Calculate price day-by-day to handle changes mid-booking
        for ($i = 0; $i < $days; $i++) {
            $currentDayDate = $start->copy()->addDays($i)->toDateString();
            
            // Filter seasonal rules matching this day
            $dayRules = $seasonalPrices->filter(function ($rule) use ($currentDayDate) {
                return $currentDayDate >= $rule->start_date && $currentDayDate <= $rule->end_date;
            });

            $dayPrice = self::resolveDayPrice($car, $dayRules);
            $totalPrice += $dayPrice;
        }

        return [
            'total_price' => $totalPrice,
            'days' => $days,
            'average_daily_rate' => round($totalPrice / $days, 2)
        ];
    }

    /**
     * Resolve the price for a single day using priority rules:
     * 1. Car-specific Flat Override
     * 2. Global Flat Override
     * 3. Car-specific Percentage Adjustment
     * 4. Global Percentage Adjustment
     * 5. Car Base Price (default)
     */
    private static function resolveDayPrice(Car $car, $rules)
    {
        // 1. Car-specific Flat Override
        $specificFlat = $rules->where('car_id', $car->id)->where('adjustment_type', 'flat_rate')->first();
        if ($specificFlat) {
            return $specificFlat->value;
        }

        // 2. Global Flat Override
        $globalFlat = $rules->whereNull('car_id')->where('adjustment_type', 'flat_rate')->first();
        if ($globalFlat) {
            return $globalFlat->value;
        }

        // 3. Car-specific Percentage Adjustment
        $specificPct = $rules->where('car_id', $car->id)->where('adjustment_type', 'percentage')->first();
        if ($specificPct) {
            return $car->base_price * $specificPct->value;
        }

        // 4. Global Percentage Adjustment
        $globalPct = $rules->whereNull('car_id')->where('adjustment_type', 'percentage')->first();
        if ($globalPct) {
            return $car->base_price * $globalPct->value;
        }

        // 5. Default base price
        return $car->base_price;
    }
}
