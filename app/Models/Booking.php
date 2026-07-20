<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'car_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'pickup_location',
        'return_location',
        'flight_number',
        'pickup_datetime',
        'return_datetime',
        'total_price',
        'status',
        'source',
        'extras',
    ];

    protected $casts = [
        'pickup_datetime' => 'datetime',
        'return_datetime' => 'datetime',
        'extras' => 'array',
    ];

    /**
     * Relationship: belongs to a car.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Generate a unique booking reference.
     */
    public static function generateReference(): string
    {
        do {
            $ref = 'CAM-' . strtoupper(Str::random(6));
        } while (self::where('booking_reference', $ref)->exists());

        return $ref;
    }
}
