<?php

namespace Tests\Feature\SystemAdmin;

use App\Helpers\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        $this->sAdmin = User::factory()->create()->assignRole(UserRole::SYSTEM_ADMIN);
    }
    public function test_system_admin_can_see_members(){
        $response = $this->actingAs($this->sAdmin)->get(route('system_admin.member_list'));
        $response->assertViewIs('system_admin.member.member_list');
        $response->assertViewHas('members');
        $response->assertOk();
    }
}
