<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'pickup_datetime',
        'return_datetime',
        'total_price',
        'status',
        'source',
    ];

    protected $casts = [
        'pickup_datetime' => 'datetime',
        'return_datetime' => 'datetime',
    ];

    /**
     * Relationship with car.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Generate unique booking reference.
     */
    public static function generateReference()
    {
        do {
            $ref = 'CAM-' . strtoupper(bin2hex(random_bytes(4)));
        } while (self::where('booking_reference', $ref)->exists());

        return $ref;
    }
}
