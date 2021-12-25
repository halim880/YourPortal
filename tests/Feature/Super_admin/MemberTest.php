<?php

namespace Tests\Feature\Super_admin;

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
        Role::create(['name'=> 'super_admin']);
        $this->sAdmin = User::factory()->create()->assignRole('super_admin');
    }
    public function test_super_admin_can_see_members(){
        $response = $this->actingAs($this->sAdmin)->get(route('super_admin.member_list'));
        $response->assertViewIs('super_admin.member.member_list');
        $response->assertViewHas('members');
        $response->assertOk();
    }
}
