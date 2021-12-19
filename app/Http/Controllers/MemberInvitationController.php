<?php

namespace App\Http\Controllers;

use App\Mail\Bussiness\MemberInvitationMail;
use App\Models\Bussiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MemberInvitationController extends Controller
{
    public function inviteUser(Request $request){
        $email = $request->email;
        $bussiness = Auth::user()->bussiness();
        Mail::to($request->email)->send(new MemberInvitationMail($email, $bussiness));

        return redirect()->back();
    }

    public function createRegisterUser(){
        return view('bussiness.create-register-user')->with([
            'bussiness'=> Bussiness::find(request('bussinessId')),
        ]);
    }
}
