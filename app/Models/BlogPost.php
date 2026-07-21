<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'translation_group',
        'locale',
        'category',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'read_time_minutes',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
