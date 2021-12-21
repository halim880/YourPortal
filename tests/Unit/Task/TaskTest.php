<?php

namespace Tests\Unit\Task;

use App\Models\Bussiness;
use App\Models\Client;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function test_task_can_be_created(){
        
        $b = Bussiness::factory()->create();
        $c = Client::factory()->create();
        $u = User::factory()->create();

        $data = [
            'title'=> 'this is a task title',
            'description'=> 'This the description of the task',
            'user_id'=> $u->id,
            'bussiness_id'=> $b->id,
            'client_id'=> $c->id,
        ];
        $task = Task::create($data);
        $this->assertNotNull($task);
    }
}
