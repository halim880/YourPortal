<?php

namespace Tests\Feature\Authentication;

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
        Role::create(['name'=> 'super_admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
        Role::create(['name'=> 'client']);
    }

    public function test_users_can_login_and_redirected_to_super_admin_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole('super_admin');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(route('super_admin.dashboard'));
    }

    public function test_member_admin_can_login_and_redirected_to_bussiness_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('member.dashboard'));
    }

    public function test_member_user_can_login_and_redirected_to_bussiness_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole('user');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('member.dashboard'));
    }

    public function test_client_can_login_and_redirected_to_client_dasbharod()
    {
        $user = User::factory()->create();
        $user->assignRole('client');

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
