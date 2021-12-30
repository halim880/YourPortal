<?php

namespace Tests\Feature\Member;

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
        $role = Role::create(['name'=>'admin']);
        $this->member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole('admin');
    }

    public function test_assign_task_form_can_be_rendered(){
        $task = Task::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('member.task.assign_form', ['task_id'=>$task->id]));
        $response->assertOk();
        $response->assertViewIs('member.task.assign_form');
        $response->assertViewHasAll(['users', 'task_id']);
    }

    public function test_member_admin_can_assign_suggested_task_to_user(){
        $user = User::factory()->create();
        $user->members()->attach($this->member->id);    
        $task = Task::factory()->create();

        Task::suggest($task->id, $this->member->id);
        // Task::assign($task->id, $this->member->id, $user->id);


        $data = [
            'task_id'=> $task->id,
            'user_id'=> $user->id,
            'member_id'=> $this->member->id,
        ];

        $reponse = $this->actingAs($this->admin)->post(route('member.task.assign'), $data);
        $reponse->assertOk();

        $tasks = Task::assignedForUser($user, $this->member->id);

        $this->assertEquals($tasks->count(), 1);
        $this->assertEquals($tasks[0]->id, $task->id);
        $this->assertEquals($tasks[0]->title, $task->title);
    }
}
