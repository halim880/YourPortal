<?php

namespace Tests\Feature\Authentication;

use App\Helpers\UserRole;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        // $this->withoutExceptionHandling();
    }

    public function system_admin_can_login_and_redirected_to_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole(UserRole::SYSTEM_ADMIN);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(route('system_admin.dashboard'));
    }

    public function test_member_super_admin_can_login_and_redirected_to_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole(UserRole::MEMBER_SUPER_ADMIN);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('member.dashboard'));
    }

    public function test_member_admin_can_login_and_redirected_to_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole(UserRole::MEMBER_ADMIN);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('member.dashboard'));
    }

    public function test_member_user_can_login_and_redirected_to_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole(UserRole::MEMBER_USER);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('member.dashboard'));
    }

    public function test_client_can_login_and_redirected_to_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole(UserRole::CLIENT);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('client.dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

}
