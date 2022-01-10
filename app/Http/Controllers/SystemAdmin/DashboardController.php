<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('system_admin.dashboard');
    }

    public function memberList(){
        return view('system_admin.member.member_list')->with([
            'members'=> Member::all(),
        ]);
    }

    public function inbox(){
        return view('system_admin.message.inbox');
    }
}
