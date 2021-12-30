<?php

namespace Tests\Feature\Member\User;

use App\Models\Member;
use App\Models\Task;
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
        $this->withoutExceptionHandling();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'user']);

        $this->member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole('admin');

        $this->user = User::factory()->create();
        $this->user->members()->attach($this->member->id);
        $this->user->assignRole('user');
    }

    public function test_member_user_can_see_assigned_tasks(){
           
        $task = Task::factory()->create();

        Task::suggest($task->id, $this->member->id);
        Task::assign($task->id, $this->member->id, $this->user->id);

        $response = $this->actingAs($this->user)->get(route('member.user.tasks.assigned'));
        $response->assertOk();
        $response->assertViewIs('member.user.task.assigned');
        $response->assertViewHas('tasks');
    }


}
