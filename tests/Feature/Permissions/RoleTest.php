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
        $this->withoutExceptionHandling();
    }
    use DatabaseMigrations;

    public function test_roles_can_be_created(){
        $this->assertTrue(true);
    }
}
