<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('super_admin.dashboard');
    }

    public function memberList(){
        return view('super_admin.member.member_list')->with([
            'members'=> Member::all(),
        ]);
    }
}
