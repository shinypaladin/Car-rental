<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'category',
        'amount',
        'spent_at',
    ];

    protected $casts = [
        'spent_at' => 'date',
        'amount' => 'float',
    ];
}
