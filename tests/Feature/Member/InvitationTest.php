<?php

namespace Tests\Feature\Member;

use App\Helpers\UserRole;
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


        $this->admin = User::factory()->create(['email'=>'admin@gmail.com']);
        $this->member = Member::factory()->create();
        $this->admin->members()->attach($this->member->id);
        $this->admin->assignRole(UserRole::MEMBER_SUPER_ADMIN);

    }
    public function test_member_admin_can_send_invitation()
    {
        $data = [
            'email'=> 'invited@mail.com',
        ];

        $response = $this->actingAs($this->admin)->post(route('member.send.invitation'), $data);
        $response->assertStatus(302);

        Mail::assertSent(MemberInvitationMail::class, function($mail){
            return $mail->hasTo('invited@mail.com')
                && $mail->member->is($this->member)
                && $mail->url == route('invited_user.create', ['m_id'=>$this->member->id]);
        });
    }


    public function test_invited_user_can_see_registration_form(){

        $member = Member::factory()->create();
        $params = ['m_id'=> $member->id];

        $response = $this->get(route('invited_user.create', $params));
        $response->assertStatus(200);
        $response->assertViewIs('member.invited_user_create');
        $response->assertSee($member->name);
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
