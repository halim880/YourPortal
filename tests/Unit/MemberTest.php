<?php

namespace Tests\Unit;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use DatabaseMigrations;

    public function test_new_member_can_be_registered(){
        $data = [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'member_logo'=> 'logo.png',
        ];

        Member::create($data);
        $member = Member::first();

        $this->assertEquals($member->name, "PopyItSoft");
        $this->assertEquals($member->member_email, "member@gmail.com");
        $this->assertEquals($member->member_phone, "+8801743920880");
    }

    public function test_member_admin_can_get_user_id_attribute(){
        $member = Member::create([
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'member_logo'=> 'logo.png',
        ]);
        $admin = User::create([
            'name'=> 'Admin',
            'email'=> 'email@gmail.com',
            'password'=> 'password'
        ]);
        DB::table('member_user')->insert([
            'user_id'=> $admin->id,
            'member_id'=> $member->id,
        ]);

        $this->assertEquals(User::first()->member()->id, $member->id);
    }


}
