<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'category',
        'seats',
        'transmission',
        'ac',
        'quantity',
        'allow_overbooking',
        'base_price',
        'image_path',
        'video_path',
    ];

    /**
     * Relationship with bookings.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Relationship with seasonal prices.
     */
    public function seasonalPrices()
    {
        return $this->hasMany(SeasonalPrice::class);
    }

    /**
     * Get available quantity for a date range.
     */
    public function getAvailableCountForRange($startDate, $endDate)
    {
        if ($this->allow_overbooking) {
            return 999; // unlimited availability simulated
        }

        // Count overlapping active bookings
        $activeBookingsCount = $this->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('pickup_datetime', [$startDate, $endDate])
                      ->orWhereBetween('return_datetime', [$startDate, $endDate])
                      ->orWhere(function ($q2) use ($startDate, $endDate) {
                          $q2->where('pickup_datetime', '<=', $startDate)
                             ->where('return_datetime', '>=', $endDate);
                      });
            })
            ->count();

        return max(0, $this->quantity - $activeBookingsCount);
    }
}
