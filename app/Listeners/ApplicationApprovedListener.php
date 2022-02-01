<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Mail\ApplicationApprovedMail;
use App\Models\member;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplicationApprovedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = $event->application;

        $pass = Str::random(6);

        DB::transaction(function() use($data, $pass){
            $user = User::create([
                'name'=> $data->admin_name,
                'email'=> $data->admin_email,
                'password'=> bcrypt($pass),
            ]);
            Member::create([
                'admin_id'=> $user->id,
                'name'=> $data->name,
                'member_email'=> $data->member_email,
                'member_phone'=> $data->member_phone,
            ]);

            $user->assignRole('admin');

            UserCreatedEvent::dispatch($user);

            Mail::to($user->email)->send(new ApplicationApprovedMail($user, $pass));
        });
    }
}
