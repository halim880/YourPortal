<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.application-approved-mail')->with([
            'name'=> $this->user->name,
            'email'=> $this->user->email,
            'password'=> $this->pass,
        ]);
    }
}
