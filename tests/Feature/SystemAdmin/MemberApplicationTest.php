<?php

namespace Tests\Feature\SystemAdmin;

use App\Helpers\PackageType;
use App\Helpers\PlanType;
use App\Helpers\RenewalType;
use App\Helpers\SubscriptionType;
use App\Helpers\UserRole;
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

        $this->admin = User::factory()->create();
        $this->admin->assignRole(UserRole::SYSTEM_ADMIN);
    }

    public function test_application_can_be_seen_by_system_admin(){
        $application = MemberApplication::create($this->applicationData());
        
        $response = $this->actingAs($this->admin)->get(route('system_admin.member_application.show', $application));
        $response->assertOk();
        $response->assertViewIs('system_admin.member_application.show');
    }

    public function test_system_admin_can_approve_application(){

        $application = MemberApplication::create($this->applicationData());
        $response = $this->actingAs($this->admin)->get(route('system_admin.member_application.approve', $application));
        $response->assertRedirect();

        Mail::assertSent(ApplicationApprovedMail::class, function($mail) use($application){
            return $mail->hasTo($application->admin_email);
        });
    }

    private function applicationData(){
        return [
            "name"=> "PopyItSoft",
            'member_email'=> "member@gmail.com",
            'member_phone'=> "+8801743920880",
            'subscription_name'=> PackageType::FREE_TRIAL,
            'plan_name'=> RenewalType::MONTHLY,
            'first_name'=> 'Akash',
            'last_name'=> 'Ahmad',
            'admin_email'=> 'test.admin@gmail.com',
        ];
    }
}
