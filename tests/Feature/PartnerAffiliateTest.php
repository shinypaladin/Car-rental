<?php

namespace Tests\Feature;

use App\Helpers\PartnerAggregator;
use App\Models\PartnerSite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerAffiliateTest extends TestCase
{
    use RefreshDatabase;

    public function test_partner_site_supports_affiliate_fields()
    {
        $partner = PartnerSite::create([
            'name' => 'Affiliate Rentals',
            'api_url' => 'https://affiliate-partner.com/api',
            'api_key' => 'secret_key_123',
            'markup_percent' => 15,
            'active' => true,
            'is_affiliate' => true,
            'affiliate_url' => 'https://affiliate-partner.com/book?ref=carairport',
        ]);

        $this->assertTrue($partner->is_affiliate);
        $this->assertEquals('https://affiliate-partner.com/book?ref=carairport', $partner->affiliate_url);
    }

    public function test_partner_aggregator_maps_affiliate_attributes()
    {
        \App\Models\Car::create([
            'brand' => 'Dacia',
            'model' => 'Logan',
            'category' => 'Economy',
            'seats' => 5,
            'transmission' => 'Manual',
            'base_price' => 250,
            'quantity' => 2,
            'display_order' => 1
        ]);

        $partner = PartnerSite::create([
            'name' => 'Affiliate Agency',
            'api_url' => 'http://localhost:8000/api',
            'api_key' => 'test_key',
            'markup_percent' => 10,
            'active' => true,
            'is_affiliate' => true,
            'affiliate_url' => 'https://affiliate-agency.com/booking-page',
        ]);

        $cars = PartnerAggregator::fetchPartnerCars('2026-08-01', '2026-08-05');

        $this->assertNotEmpty($cars);
        $this->assertTrue($cars[0]['is_affiliate']);
        $this->assertEquals('https://affiliate-agency.com/booking-page', $cars[0]['affiliate_url']);
    }
}
