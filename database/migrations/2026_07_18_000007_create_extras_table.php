<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->string('type'); // per_day, flat
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Seed with default extras
        DB::table('extras')->insert([
            [
                'name' => 'Full Insurance (CDW)',
                'slug' => 'insurance',
                'price' => 150.00,
                'type' => 'per_day',
                'description' => 'Zero liability coverage for collision damages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'GPS Navigation System',
                'slug' => 'gps',
                'price' => 50.00,
                'type' => 'per_day',
                'description' => 'Real-time GPS navigation assistant.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Child Safety Seat',
                'slug' => 'child_seat',
                'price' => 50.00,
                'type' => 'per_day',
                'description' => 'Recommended for safety of young children.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Additional Driver',
                'slug' => 'additional_driver',
                'price' => 100.00,
                'type' => 'flat',
                'description' => 'Authorizes a second driver to operate the vehicle.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extras');
    }
};
