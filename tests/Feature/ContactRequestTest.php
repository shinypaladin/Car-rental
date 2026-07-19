<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContactRequest;
use App\Models\User;
use Tests\TestCase;

class ContactRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission_saves_to_database()
    {
        $response = $this->post('/en/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+212600000000',
            'message' => 'Hello, I want to rent a car.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_requests', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+212600000000',
            'message' => 'Hello, I want to rent a car.',
        ]);
    }

    public function test_admin_can_delete_contact_request()
    {
        $contact = ContactRequest::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Test message',
        ]);

        $admin = User::factory()->create();

        // Acting as admin with custom session auth
        $response = $this->withSession(['admin_logged_in' => true])
            ->delete("/en/admin/contact-requests/{$contact->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('contact_requests', [
            'id' => $contact->id
        ]);
    }
}
