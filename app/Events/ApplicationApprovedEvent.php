<?php

namespace App\Events;

use App\Models\Bussiness\BussinessApplication;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplicationApprovedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public BussinessApplication $application;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BussinessApplication $application)
    {
        $this->application = $application;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
