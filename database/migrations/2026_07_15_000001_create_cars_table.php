<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('category'); // Economy, SUV, Luxury, Van
            $table->integer('seats');
            $table->string('transmission'); // Manual, Automatic
            $table->boolean('ac')->default(true);
            $table->integer('quantity'); // total fleet size
            $table->boolean('allow_overbooking')->default(false);
            $table->decimal('base_price', 8, 2); // Daily rate in DH
            $table->string('image_path')->nullable(); // static photo
            $table->string('video_path')->nullable(); // hover looping video
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
