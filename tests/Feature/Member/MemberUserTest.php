<?php

namespace Tests\Feature\Member;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberUserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

        $role = Role::create(['name'=>'admin']);
        $this->member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole('admin');
    }

    public function test_member_users_can_see_user_list(){
        User::factory()->create()->members()->attach($this->member->id);
        User::factory()->create()->members()->attach($this->member->id);
        User::factory()->create()->members()->attach($this->member->id);

        $response = $this->actingAs($this->admin)->get(route('member.user.index', ['m_id'=> $this->member->id]));
        $response->assertOk();
        $response->assertViewIs('member.user.index');
        $response->assertViewHas('users');
    }
}
