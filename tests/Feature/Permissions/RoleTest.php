<?php

namespace Tests\Feature\Permissions;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class RoleTest extends TestCase
{
    public function setUp():void{
        parent::setUp();
        Role::create(['name'=> 'super_admin']);
        $this->withoutExceptionHandling();
    }
    use DatabaseMigrations;

    public function test_roles_can_be_created(){
        $user = User::factory()->create();
        $user->assignRole("super_admin");
        $data = [
            'name'=> 'admin',
        ];

        $response = $this->actingAs($user)->post(route('role.store'), $data);
        $response->assertOk();
        $response->assertSessionHas('success', 'Role has been successfully saved');
    }
}
