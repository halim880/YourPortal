<?php

namespace Tests\Feature\Client;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ClientDashboardTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();

        Role::create(['name'=> 'client']);
        $this->withoutExceptionHandling();

        $this->client = User::factory()->create()->assignRole('client');
    }

    public function test_client_has_access_to_dashboard(){
        $response = $this->actingAs($this->client)->get(route('client.dashboard'));
        $response->assertOk();
        $response->assertViewIs('client.dashboard');
    }
}
