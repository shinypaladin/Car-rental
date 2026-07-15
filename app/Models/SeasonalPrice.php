<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonalPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
        'start_date',
        'end_date',
        'adjustment_type',
        'value',
    ];

    /**
     * Relationship with car.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
