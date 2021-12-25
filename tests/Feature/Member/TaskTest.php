<?php

namespace Tests\Feature\Member;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $role = Role::create(['name'=>'admin']);
        $this->member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole('admin');
    }

    public function test_member_admin_can_see_suggested_task(){
        
    }


}
