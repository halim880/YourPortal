<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_can_register_with_email_and_password(){
        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $path = public_path("images/users/". User::first()->image);
        $this->assertFileExists($path);
        @unlink($path);
        $this->assertFileDoesNotExist($path);
    }

    public function test_initial_avatar_is_created(){
        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $path = public_path("images/users/". User::first()->image);

        $this->assertFileExists($path);
        @unlink($path);
        $this->assertFileDoesNotExist($path);
    }
}
