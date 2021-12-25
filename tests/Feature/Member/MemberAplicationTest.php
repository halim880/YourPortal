<?php

namespace Tests\Feature\Member;

use App\Mail\BussinessApplicationReceived;
use App\Mail\MemberApplicationReceived;
use App\Models\User;
use App\Notifications\Bussiness\NotifyMemberApplicationCreated;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberAplicationTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp() : void{
        parent::setUp();
        Notification::fake();
        Mail::fake();

        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);

        $this->user = User::factory()->create();
        $this->user->assignRole('super_admin');
    }

    public function test_user_can_apply_for_membership()
    {
        $data = [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
        ];

        $this->post(route('member_application.store'), $data)->assertOk();

        Notification::sent($this->user, NotifyMemberApplicationCreated::class);
        // Mail::assertSent(MemberApplicationReceived::class, function($mail){
        //     return $mail->hasTo('admin@gmail.com');
        // });
    }
}
