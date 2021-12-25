<?php

namespace App\Mail\Member;

use App\Models\Bussiness;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberInvitationMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $email;
    public $bussiness;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $bussiness)
    {
        $this->email = $email;
        $this->bussiness = $bussiness;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.member-invitation')->with([
            'email'=> $this->email,
            'bussiness_name'=> $this->bussiness->name,
            'bussiness_id'=> $this->bussiness->id,
        ]);
    }
}
