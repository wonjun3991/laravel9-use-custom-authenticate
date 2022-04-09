<?php

namespace Tests\Feature;

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_login_by_custom_auth_provider(): void
    {
        $this->withoutMiddleware();

        $member = Member::factory()->create();

        $this->assertNull(Auth::user());

        $response = $this->post(route('login'), [
            'email' => $member->email,
            'password' => 1234
        ]);

        $response->assertStatus(302);
        $this->assertSame($member->email, Auth::user()->email);
    }
}
