<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class SystemAdminMemberController extends Controller
{
    public function show(Member $member){
        return view("system_admin.member.show")->with([
            'member'=> $member,
            'admin'=> $member->superAdmin,
        ]);
    }
}
