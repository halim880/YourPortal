<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function landingPage() {
        return view('web.landing_page');
    }

    public function contactPage() {
        return view('web.contact');
    }

    public function aboutPage() {
        return view('web.about');
    }

    public function faqPage() {
        return view('web.faq');
    }

    public function servicePage() {
        return view('web.service');
    }

    public function home(){
        return "Home";
    }
}
