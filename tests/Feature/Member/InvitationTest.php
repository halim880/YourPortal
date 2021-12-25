<?php

namespace Tests\Feature\Member;

use App\Mail\Member\MemberInvitationMail;
use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class InvitationTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        Mail::fake();

        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
        Role::create(['name'=> 'client']);

        $this->admin = User::factory()->create(['email'=>'admin@gmail.com']);
        $this->admin->assignRole('admin');

    }
    public function test_member_admin_can_send_invitation()
    {
        $data = [
            'email'=> 'test@mail.com',
        ];

        $response = $this->actingAs($this->admin)->post('member/send/invitation', $data);
        $response->assertStatus(302);

        Mail::assertSent(MemberInvitationMail::class, function($mail){
            return $mail->hasTo('test@mail.com');
        });
    }

    public function test_user_can_register_through_invitation(){
        $member = Member::factory()->create();

        $data = [
            'member_id'=> $member->id,
            'name'=> 'akash',
            'email'=> 'test@mail.com',
            'password'=> 'password'
        ];

        $response = $this->post(route('invited_user.store'), $data);
        $user = User::where('email', 'test@mail.com')->get()->first();
        $response->assertRedirect(route('login'));
        $this->assertNotNull($user->members);

    }
}
