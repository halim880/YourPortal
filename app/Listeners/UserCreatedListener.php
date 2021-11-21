<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UserCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        DB::afterCommit(function() use ($event){
            if ($event->user->image == null) {
                $this->setInitialAvatar($event->user);
            }
        });
    }

    private function setInitialAvatar(User $user){
        $path = "images/users/";
        $fontPath = public_path("fonts/tommy.ttf");
        $char = strtoupper($user->name[0]);
        $avatarName = rand(12, 34353).time()."_avatar.png";
        $dest = $path.$avatarName;

        $avatarCreaded = makeAvatar($fontPath, $dest, $char);

        $user->image = $avatarCreaded != null? $avatarName : "";
        $user->update();
    }
}
