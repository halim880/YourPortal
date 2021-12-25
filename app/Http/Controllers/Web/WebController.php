<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function landingPage() {
        return view('landing.landing_page');
    }

    public function home(){
        return "Home";
    }
}
