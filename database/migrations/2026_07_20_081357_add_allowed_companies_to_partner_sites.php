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
        Schema::table('partner_sites', function (Blueprint $table) {
            $table->text('allowed_companies')->nullable(); // will store JSON or comma-separated list of companies
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_sites', function (Blueprint $table) {
            $table->dropColumn('allowed_companies');
        });
    }
};
