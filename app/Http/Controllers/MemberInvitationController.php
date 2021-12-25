<?php

namespace App\Http\Controllers;

use App\Mail\Member\MemberInvitationMail;
use App\Models\Member;
use App\Models\User;
use App\Http\Requests\InivitedUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MemberInvitationController extends Controller
{
    public function inviteUser(Request $request){
        $email = $request->email;
        $member = Auth::user()->member();
        Mail::to($request->email)->send(new MemberInvitationMail($email, $member));

        return redirect()->back();
    }

    public function createRegisterUser(){
        return view('member.create-register-user')->with([
            'member'=> member::find(request('memberId')),
        ]);
    }
}
