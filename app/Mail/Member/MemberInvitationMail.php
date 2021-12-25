<?php

namespace App\Mail\Member;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;
    public string $url;
    public Member $member;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $member, $url)
    {
        $this->email = $email;
        $this->member = $member;
        $this->url = $url;
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
            'member_name'=> $this->member->name,
            'url'=> $this->url,
        ]);
    }
}
