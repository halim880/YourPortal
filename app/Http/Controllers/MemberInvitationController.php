<?php

namespace App\Http\Controllers;

use App\Mail\Member\MemberInvitationMail;
use App\Models\Member;
use App\Models\User;
use App\Http\Requests\InivitedUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MemberInvitationController extends Controller
{
    public function inviteUser(Request $request){
        $this->sendMailToUser();
        Session::flash('message', 'Invitation send to '.request('email'));
        return redirect()->back();
    }

    public function createRegisterUser(){
        return view('member.invited_user_create')->with([
            'member'=> member::find(request('m_id')),
        ]);
    }

    private function sendMailToUser(){
        $email = request('email');
        $member = Auth::user()->member();
        $url = route('invited_user.create', ['m_id'=> $member->id]);
        Mail::to($email)->send(new MemberInvitationMail($email, $member, $url));
    }
}
