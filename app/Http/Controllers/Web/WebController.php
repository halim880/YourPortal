<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\ServiceInfo;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function landingPage() {
        return view('web.landing_page')->with([
            'serviceInfos'=> ServiceInfo::all(),
        ]);
    }

    public function contactPage() {
        return view('web.contact');
    }

    public function aboutPage() {
        return view('web.about');
    }

    public function faqPage() {
        return view('web.faq')->with([
            'faqs'=> Faq::orderBy('priority', 'ASC')->get(),
        ]);
    }

    public function servicePage() {
        return view('web.service');
    }

    public function home(){
        return "Home";
    }
}
