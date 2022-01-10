<?php

namespace Tests\Feature\SystemAdmin;

use App\Helpers\UserRole;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SystemAdminTaskTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->system_admin = User::factory()->create()->assignRole(UserRole::SYSTEM_ADMIN);
    }

    public function test_system_admin_can_see_task_list(){
        Task::factory()->count(3)->create();

        $response = $this->actingAs($this->system_admin)->get(route('system_admin.task.list'));
        $response->assertOk();
        $response->assertViewIs('system_admin.task.task_list');
        $response->assertViewHas('tasks');
    }
}
