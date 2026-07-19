<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_redirects_root_to_locale(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_the_localized_homepage_returns_successful_response(): void
    {
        // Seed a vehicle to force template rendering
        \App\Models\Car::create([
            'brand' => 'Dacia',
            'model' => 'Logan',
            'category' => 'Economy',
            'seats' => 5,
            'transmission' => 'Manual',
            'ac' => true,
            'quantity' => 2,
            'allow_overbooking' => false,
            'base_price' => 300.00,
            'image_path' => '/images/dacia_logan.jpg',
            'video_path' => '/videos/dacia_logan.mp4',
        ]);

        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('Dacia Logan');
    }

    public function test_informational_pages_return_successful_responses(): void
    {
        foreach (['en', 'fr'] as $locale) {
            foreach (['about', 'faq', 'terms', 'privacy', 'cookie'] as $page) {
                $response = $this->get("/{$locale}/{$page}");
                $response->assertStatus(200);
            }
        }
    }

    public function test_sitemap_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
        $this->assertStringContainsString('<urlset', $response->getContent());
    }

    public function test_robots_returns_valid_text(): void
    {
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $this->assertStringContainsString('User-agent:', $response->getContent());
        $this->assertStringContainsString('Sitemap:', $response->getContent());
    }

    public function test_admin_dashboard_renders_successfully()
    {
        $response = $this->withSession(['admin_logged_in' => true])
            ->get('/en/admin');

        $response->assertStatus(200);
    }
}
