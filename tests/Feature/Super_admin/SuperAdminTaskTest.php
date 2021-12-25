<?php

namespace Tests\Feature\Super_admin;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SuperAdminTaskTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);
        $this->super_admin = User::factory()->create()->assignRole('super_admin');
    }

    public function test_super_admin_can_see_task_list(){
        Task::factory()->count(3)->create();

        $response = $this->actingAs($this->super_admin)->get(route('super_admin.task.list'));
        $response->assertOk();
        $response->assertViewIs('super_admin.task.task_list');
        $response->assertViewHas('tasks');
    }
}
