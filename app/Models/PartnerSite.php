<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSite extends Model
{
    protected $fillable = [
        'name',
        'api_url',
        'api_key',
        'markup_percent',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'markup_percent' => 'float',
    ];
}
