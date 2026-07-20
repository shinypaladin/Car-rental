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
        'min_days',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'value'      => 'float',
        'min_days'   => 'integer',
    ];

    /**
     * Relationship: optionally belongs to a specific car (null = applies to all).
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
