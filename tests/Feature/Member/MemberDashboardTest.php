<?php

namespace Tests\Feature\Member;

use App\Helpers\UserRole;
use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MemberDashboardTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

        $member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->assignRole(UserRole::MEMBER_SUPER_ADMIN);
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

    public function test_files_page_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get(route('member.files.index'));
        $response->assertOk();
        $response->assertViewIs('member.files.index');
    }



}
