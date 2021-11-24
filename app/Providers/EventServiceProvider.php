<?php

namespace App\Providers;

use App\Events\ApplicationApprovedEvent;
use App\Events\Bussiness\BussinessApplicationCreatedEvent;
use App\Events\UserCreatedEvent;
use App\Listeners\ApplicationApprovedListener;
use App\Listeners\Bussiness\BussinessApplicationCreatedListener;
use App\Listeners\UserCreatedListener;
use App\Mail\ApplicationApprovedMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserCreatedEvent::class => [
            UserCreatedListener::class,
        ],

        BussinessApplicationCreatedEvent::class => [
            BussinessApplicationCreatedListener::class,
        ],
        ApplicationApprovedEvent::class => [
            ApplicationApprovedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
