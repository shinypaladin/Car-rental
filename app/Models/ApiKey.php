<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    protected $fillable = [
        'name',
        'key',
        'active',
        'discount_percent',
    ];

    protected $casts = [
        'active' => 'boolean',
        'discount_percent' => 'float',
    ];
}
