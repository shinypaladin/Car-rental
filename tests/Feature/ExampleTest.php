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
        $response = $this->get('/en');

        $response->assertStatus(200);
    }
}
