<?php

namespace Tests\Feature\Bussiness;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class BussinessDashboardTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
        Role::create(['name'=> 'client']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

    }
    public function test_bussiness_dashboard_can_be_rendered()
    {
        $response = $this->actingAs($this->admin)->get('/bussiness-dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('bussiness.dashboard');
        // $response->assertViewHas('bussiness');
    }

    public function test_invite_user_page_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get('/invite-user');
        $response->assertOk();
        $response->assertViewIs('bussiness.invite_user');
    }
}
