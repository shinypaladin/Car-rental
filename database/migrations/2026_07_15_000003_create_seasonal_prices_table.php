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
        Schema::create('seasonal_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->nullable()->constrained()->onDelete('cascade'); // Null means applies to all cars
            $table->string('name'); // e.g. "Summer Season", "New Year Peak"
            $table->date('start_date');
            $table->date('end_date');
            $table->string('adjustment_type'); // percentage (multiplier) or flat_rate (fixed override)
            $table->decimal('value', 8, 2); // e.g. 1.25 for +25% or 500.00 for flat price override
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasonal_prices');
    }
};
