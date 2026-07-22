<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partner_sites', function (Blueprint $table) {
            $table->boolean('is_affiliate')->default(false)->after('active');
            $table->string('affiliate_url')->nullable()->after('is_affiliate');
        });
    }

    public function down(): void
    {
        Schema::table('partner_sites', function (Blueprint $table) {
            $table->dropColumn(['is_affiliate', 'affiliate_url']);
        });
    }
};
