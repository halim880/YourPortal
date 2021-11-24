<?php

namespace Tests\Feature\Bussiness;

use App\Mail\BussinessApplicationReceived;
use App\Models\User;
use App\Notifications\Bussiness\NotifyApplicationProcessing;
use App\Notifications\Bussiness\NotifyBussinessApplicationCreated;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class BussinessAplicationTest extends TestCase
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

    public function test_user_can_apply_for_bussiness_membership()
    {
        $data = [
            "name"=> "PopyItSoft",
            'bussiness_email'=> "bussiness@gmail.com",
            'bussiness_phone'=> "+8801743920880",
            'admin_name'=> 'Akash',
            'admin_email'=> 'admin@gmail.com',
        ];

        $this->post(route('bussiness_application.store'), $data)->assertOk();

        Notification::sent($this->user, NotifyBussinessApplicationCreated::class);
        Mail::assertSent(BussinessApplicationReceived::class, function($mail){
            return $mail->hasTo('admin@gmail.com');
        });
    }
}
