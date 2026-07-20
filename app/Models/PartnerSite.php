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
        'display_order',
        'category_markups',
        'allowed_companies',
        'allowed_brands',
    ];

    protected $casts = [
        'active' => 'boolean',
        'markup_percent' => 'float',
        'category_markups' => 'array',
        'allowed_companies' => 'array',
        'allowed_brands' => 'array',
    ];
}
