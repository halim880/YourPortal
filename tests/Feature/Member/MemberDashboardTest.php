<?php

namespace Tests\Feature\Member;

use App\Models\Member;
use App\Models\User;
use Database\Factories\MemberFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberDashboardTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
        Role::create(['name'=> 'client']);

        $member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->admin->members()->attach($member->id);

    }
    public function test_member_dashboard_can_be_rendered()
    {
        $response = $this->actingAs($this->admin)->get(route('member.dashboard'));
        $response->assertStatus(200);
        $response->assertViewIs('member.dashboard');
        $response->assertViewHas('member');
    }

    public function test_invite_user_page_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get(route('member.invite_user'));
        $response->assertOk();
        $response->assertViewIs('member.invite_user');
    }
}
