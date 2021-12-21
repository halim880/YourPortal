<?php

namespace Tests\Feature\Task;

use App\Models\Bussiness;
use App\Models\Client;
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
        Role::create(['name'=> 'admin']);
        $this->admin = User::factory()->create()->assignRole('admin');
    }

    public function test_task_create_form_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get(route('tasks.create'));
        $response->assertOk();
        $response->assertViewIs('bussiness.task.create');
    }

    public function test_task_can_be_stored(){
        $this->withoutExceptionHandling();

        $b = Bussiness::factory()->create();
        $c = Client::factory()->create();
        $data = [
            'title'=> 'this is a task title',
            'description'=> 'This the description of the task',
            'bussiness_id'=> $b->id,
            'client_id'=> $c->id,
        ];
        $response = $this->actingAs($this->admin)->post('tasks', $data);
        $task = Task::first();
        $this->assertNotNull($task);
    }
}
