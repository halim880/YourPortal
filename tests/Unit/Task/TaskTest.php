<?php

namespace Tests\Unit\Task;

use App\Helpers\UserRole;
use App\Models\Client;
use App\Models\Member;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();

        $this->member = Member::factory()->create();
        $this->admin = User::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole(UserRole::MEMBER_SUPER_ADMIN);
    }

    public function test_task_can_be_created(){
        
        $client = Client::factory()->create();

        $data = [
            'title'=> 'this is a task title',
            'description'=> 'This the description of the task',
            'client_id'=> $client->id,
        ];
        $task = Task::create($data);
        $this->assertFalse($task->isAssigned());

        $this->assertNotNull($task);
    }

    public function test_member_admin_can_see_suggested_task(){
        $task1 = Task::factory()->create();
        $task2 = Task::factory()->create();

        Task::suggest($task1->id, $this->member->id);
        Task::suggest($task2->id, $this->member->id);

        $tasks = Task::suggestedForMember($this->member->id);

        $this->assertEquals($tasks->count(), 2);
        $this->assertTrue($tasks[0]->id == $task1->id);
        $this->assertTrue($tasks[0]->title == $task1->title);
        $this->assertTrue($tasks[1]->id == $task2->id);
        $this->assertTrue($tasks[1]->title == $task2->title);
    }

    public function test_member_admin_can_assign_suggested_task_to_user(){
        $user = User::factory()->create();
        $user->members()->attach($this->member->id);    

        $task = Task::factory()->create();
        Task::suggest($task->id, $this->member->id);

        Task::assign($task->id, $this->member->id, $user->id);

        $tasks = Task::assignedForUser($user, $this->member->id);

        $this->assertEquals($tasks->count(), 1);
        $this->assertEquals($tasks[0]->id, $task->id);
        $this->assertEquals($tasks[0]->title, $task->title);
    }
}
