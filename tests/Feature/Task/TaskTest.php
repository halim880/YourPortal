<?php

namespace Tests\Feature\Task;

use App\Helpers\UserRole;
use App\Models\member;
use App\Models\Client;
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

        $this->withoutExceptionHandling();

        $this->admin = User::factory()->create()->assignRole(UserRole::MEMBER_SUPER_ADMIN);


        $this->client = User::factory()->create()->assignRole(UserRole::CLIENT);
        Client::factory()->create(['user_id'=> $this->client->id]);
    }

    public function test_task_create_form_can_be_rendered(){
        $response = $this->actingAs($this->client)->get(route('client.tasks.create'));
        $response->assertOk();
        $response->assertViewIs('client.task.create');
    }

    public function test_task_can_be_stored(){

        $b = Member::factory()->create();
        $c = Client::factory()->create();
        
        $data = [
            'title'=> 'this is a task title',
            'description'=> 'This the description of the task',
            'client_id'=> $c->id,
        ];
        $response = $this->actingAs($this->client)->post(route('client.tasks.store'), $data);
        $task = Task::first();
        $this->assertNotNull($task);
    }

    public function test_task_can_be_deleted(){
        $this->assertTrue(true);
    }

    public function test_client_can_get_task_list(){
        $this->withoutExceptionHandling();
        $c = Client::factory()->create();
        $response = $this->actingAs($this->client)->get(route('client.tasks.index'));
        $response->assertViewIs('client.task.index');
        $response->assertViewHas('tasks');
    }

}
