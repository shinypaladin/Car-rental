<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_url');
            $table->string('api_key');
            $table->decimal('markup_percent', 5, 2)->default(0.00);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_sites');
    }
};
