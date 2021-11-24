<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Mail\ApplicationApprovedMail;
use App\Models\Bussiness;
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

        $userData = [
            'name'=> $data->admin_name,
            'email'=> $data->admin_email,
            'password'=> bcrypt($pass),
        ];

        $bussinessData = [
            'name'=> $data->name,
            'bussiness_email'=> $data->bussiness_email,
            'bussiness_phone'=> $data->bussiness_phone,
        ];

        DB::transaction(function() use($userData, $bussinessData, $pass){
            $user = User::create($userData);
            Bussiness::create($bussinessData);

            $user->assignRole('admin');

            UserCreatedEvent::dispatch($user);

            Mail::to($user->email)->send(new ApplicationApprovedMail($user, $pass));
        });
    }
}
