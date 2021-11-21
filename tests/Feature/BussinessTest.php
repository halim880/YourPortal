<?php

namespace Tests\Feature;

use App\Models\Bussiness;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BussinessTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp() : void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_bussiness_can_be_store_with_an_initial_admin(){
        $data = [
            "name"=> "PopyItSoft",
            'bussiness_email'=> "bussiness@gmail.com",
            'bussiness_phone'=> "+8801743920880",
            'bussiness_logo'=> 'logo.png',
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
            'passowrd'=> 'password',
        ];

        $response = $this->post(route('bussiness.store'), $data);
        $response->assertOk();
        $bussiness = Bussiness::first();
        $user = User::first();
        $this->assertNotNull($bussiness);
        $this->assertNotNull($user);

        $path = public_path(User::IMAGE_PATH.$user->image);
        $this->assertFileExists($path);
        @unlink($path);
        $this->assertFileDoesNotExist($path);

    }
}
