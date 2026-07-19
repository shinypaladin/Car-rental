<?php

namespace Tests\Feature;

use App\Models\PartnerSite;
use App\Helpers\PartnerAggregator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PartnerAggregatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_aggregates_partner_inventory_with_markup()
    {
        // 1. Create a dummy partner site configuration
        $partner = PartnerSite::create([
            'name' => 'Casablanca Agency',
            'api_url' => 'https://casa-agency.com/api',
            'api_key' => 'casa_key_123',
            'markup_percent' => 10.00, // +10% markup
            'active' => true
        ]);

        // 2. Fake the HTTP call response from the partner site
        Http::fake([
            'https://casa-agency.com/api/availability*' => Http::response([
                'status' => 'success',
                'vehicles' => [
                    [
                        'vehicle_id' => 45,
                        'brand' => 'Renault',
                        'model' => 'Clio',
                        'category' => 'Economy',
                        'seats' => 5,
                        'transmission' => 'Manual',
                        'ac' => 'Yes',
                        'rate_per_day' => 200,
                        'total_price' => 1000,
                        'image_path' => '/images/clio.jpg'
                    ]
                ]
            ], 200)
        ]);

        // 3. Fetch partner cars
        $cars = PartnerAggregator::fetchPartnerCars('2026-07-25 10:00', '2026-07-30 10:00');

        $this->assertCount(1, $cars);
        $this->assertEquals("partner_{$partner->id}_45", $cars[0]['id']);
        $this->assertEquals('Renault', $cars[0]['brand']);
        // 200 rate + 10% markup = 220 rate
        $this->assertEquals(220, $cars[0]['base_price']);
        // 1000 total + 10% markup = 1100 total
        $this->assertEquals(1100, $cars[0]['total_price']);
    }

    public function test_forwards_booking_to_partner()
    {
        $partner = PartnerSite::create([
            'name' => 'Casablanca Agency',
            'api_url' => 'https://casa-agency.com/api',
            'api_key' => 'casa_key_123',
            'markup_percent' => 10.00,
            'active' => true
        ]);

        Http::fake([
            'https://casa-agency.com/api/booking' => Http::response([
                'status' => 'success',
                'reservation_status' => 'Confirmed',
                'total_price' => 1000
            ], 200)
        ]);

        $result = PartnerAggregator::forwardBookingToPartner($partner, [
            'partner_vehicle_id' => 45,
            'customer_name' => 'Client Name',
            'customer_email' => 'client@email.com',
            'customer_phone' => '+212600000000',
            'pickup_datetime' => '2026-07-25 10:00',
            'return_datetime' => '2026-07-30 10:00'
        ]);

        $this->assertNotNull($result);
        $this->assertEquals('success', $result['status']);
        $this->assertEquals('Confirmed', $result['reservation_status']);
    }

    public function test_can_update_partner_site()
    {
        $partner = PartnerSite::create([
            'name' => 'Old Agency Name',
            'api_url' => 'https://old-agency.com/api',
            'api_key' => 'old_key',
            'markup_percent' => 5.00,
            'active' => true
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->post("/en/admin/partner-sites/update/{$partner->id}", [
            'name' => 'New Agency Name',
            'api_url' => 'https://new-agency.com/api',
            'api_key' => 'new_key',
            'markup_percent' => 15.50
        ]);

        $response->assertStatus(302);
        
        $partner->refresh();
        $this->assertEquals('New Agency Name', $partner->name);
        $this->assertEquals('https://new-agency.com/api', $partner->api_url);
        $this->assertEquals('new_key', $partner->api_key);
        $this->assertEquals(15.50, $partner->markup_percent);
    }
}
