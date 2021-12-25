<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp() : void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_member_create_page_can_be_rendered(){
        $response = $this->get(route('member.create'));
        $response->assertOk();
        $response->assertViewIs('member.create');
    }

    public function test_member_can_be_store_with_an_initial_admin(){
        $data = [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'member_logo'=> 'logo.png',
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
            'password'=> 'password',
            'password_confirmation'=> 'password',
        ];

        $response = $this->post(route('member.store'), $data);
        $response->assertOk();
        $member = Member::first();
        $user = User::first();
        $this->assertNotNull($member);
        $this->assertNotNull($user);

        $path = public_path(User::IMAGE_PATH.$user->image);
        $this->assertFileExists($path);
        @unlink($path);
        $this->assertFileDoesNotExist($path);

    }
}
