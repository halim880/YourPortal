<?php

namespace App\Listeners\Bussiness;

use App\Mail\BussinessApplicationReceived;
use App\Models\Bussiness\BussinessApplication;
use App\Notifications\Bussiness\NotifyBussinessApplicationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Expr\New_;
use Spatie\Permission\Models\Role;

class BussinessApplicationCreatedListener
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
        $ap = $event->application;
        $super_admins = Role::where('name', 'super_admin')->first()->users;
        Notification::send($super_admins, new NotifyBussinessApplicationCreated($ap));
        Mail::to($ap->admin_email)->send(new BussinessApplicationReceived($ap->admin_name));
    }
}
