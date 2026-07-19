<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->smallInteger('model_year')->nullable()->after('model');
            $table->tinyInteger('model_month')->nullable()->after('model_year')->comment('1-12');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['model_year', 'model_month']);
        });
    }
};
