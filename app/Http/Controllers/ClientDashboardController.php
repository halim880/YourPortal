<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function dashboard(){
        return view('client.dashboard');
    }
}
