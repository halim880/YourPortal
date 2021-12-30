<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Bussiness;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberList(){
        return view('system_admin.member.member_list')->with([
            'members'=> Member::all(),
        ]);
    }

}
