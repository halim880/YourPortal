<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    public function dashboard(){
        return view('member.dashboard')->with([
            'member'=> Auth::user()->member(),
        ]);
    }

    public function createInvitation(){
        return view('member.invite_user');
    }

    public function inbox(){
        return view('member.message.inbox');
    }
}
