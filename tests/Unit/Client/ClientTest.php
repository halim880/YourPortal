<?php

namespace Tests\Unit\Client;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    public function test_client_can_be_created(){
        $user = User::create([
            'name'=> "test client",
            'email'=> 'test@gmail.com',
            'password'=> bcrypt('password'),
        ]);
        $data = [
            'user_id'=> $user->id,
            'TIN'=> 12345,
            'phone'=> '017743-920880',
        ];
        
        $client=Client::create($data);
        $this->assertNotNull($client);
        $this->assertEquals($client->id, $user->client_id);
    }
}
