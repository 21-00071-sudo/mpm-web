<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_login_with_correct_credentials()
    {
        // 1. Create a user with a known username and password.
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        // 2. Simulate a POST request to the login route with the correct credentials.
        $response = $this->withoutMiddleware()->post('/login', [
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        // 3. Assert that the user is redirected to the dashboard and is authenticated.
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    #[Test]
    public function a_user_cannot_login_with_incorrect_password()
    {
        // 1. Create a user.
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        // 2. Simulate a POST request with an incorrect password.
        $response = $this->withoutMiddleware()->post('/login', [
            'username' => 'testuser',
            'password' => 'wrong-password',
        ]);

        // 3. Assert that the user is not authenticated and redirected back.
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }

    #[Test]
    public function a_user_cannot_login_with_non_existent_username()
    {
        // 1. Do not create a user.

        // 2. Simulate a POST request with a username that doesn't exist.
        $response = $this->withoutMiddleware()->post('/login', [
            'username' => 'nonexistentuser',
            'password' => 'password123',
        ]);

        // 3. Assert that the request fails with a validation error for the username.
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }
}
