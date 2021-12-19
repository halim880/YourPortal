<?php

namespace Tests\Feature\Bussiness;

use App\Mail\Bussiness\MemberInvitationMail;
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

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

    }
    public function test_bussiness_admin_can_send_invitation()
    {
        $data = [
            'email'=> 'test@mail.com',
        ];

        $response = $this->actingAs($this->admin)->post('bussiness/send/invitation', $data);
        $response->assertStatus(200);

        Mail::assertSent(MemberInvitationMail::class, function($mail){
            return $mail->hasTo('test@mail.com');
        });
    }
}
