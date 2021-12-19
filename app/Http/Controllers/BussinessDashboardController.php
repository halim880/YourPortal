<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BussinessDashboardController extends Controller
{
    public function dashboard(){
        return view('bussiness.dashboard');
    }

    public function createInvitation(){
        return view('bussiness.invite_user');
    }
}
