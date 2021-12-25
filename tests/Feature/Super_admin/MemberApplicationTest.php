<?php

namespace Tests\Feature\Super_admin;

use App\Mail\ApplicationApprovedMail;
use App\Models\Member\MemberApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberApplicationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void{
        parent::setUp();
        Notification::fake();
        Mail::fake();

        $this->withoutExceptionHandling();
        Role::create(['name'=> 'super_admin']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('super_admin');

        Role::create(['name'=> 'admin']);
    }

    public function test_application_can_be_seen_by_super_admin(){
        $data = [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
        ];

        $application = MemberApplication::create($data);
        
        $response = $this->actingAs($this->admin)->get(route('super_admin.member_application.show', $application));
        $response->assertOk();
        $response->assertViewIs('super_admin.member_application.show');
    }

    public function test_super_admin_can_approve_application(){
        $data = [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
        ];

        $application = MemberApplication::create($data);
        $response = $this->actingAs($this->admin)->get(route('super_admin.member_application.approve', $application));
        $response->assertRedirect();

        Mail::assertSent(ApplicationApprovedMail::class, function($mail) use($application){
            return $mail->hasTo($application->admin_email);
        });
    }
}
