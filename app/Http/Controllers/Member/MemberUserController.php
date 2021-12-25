<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberUserController extends Controller
{
    public function index(){
        $users = Member::findOrFail(request('m_id'))->users;
        return view('member.user.index')->with([
            'users'=> $users,
        ]);
    }
}
