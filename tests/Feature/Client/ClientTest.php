<?php

namespace Tests\Feature\Client;

use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    public function test_client_registration_page_can_be_rendered(){
        $response = $this->get(route('clients.create'));
        $response->assertOk();
        $response->assertViewIs('client.create');
    }

    public function test_client_can_be_stored(){
        $this->withoutExceptionHandling();
        
        Role::create(['name'=> 'client']);
        $data = [
            'name'=> "test client",
            'email'=> 'test@gmail.com',
            'phone'=> '01743920880',
            'password'=> bcrypt('password'),
            'TIN'=> 12345,
        ];
        $response = $this->post('clients', $data);
        $response->assertRedirect(route('login'));
        $c = Client::first();
        $this->assertNotNull($c);
    }
}
