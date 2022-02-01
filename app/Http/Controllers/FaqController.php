<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function index(){
        return view('system_admin.web_settings.faq.index')->with([
            'faqs'=> Faq::orderBy('priority', 'ASC')->get(),
        ]);
    }
    
    public function create(){
        return view('system_admin.web_settings.faq.create');
    }

    public function update(Faq $faq, Request $request){

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->priority = $request->priority;
        $faq->update();

        Session::flash('message', 'FAQ is updated');
        return redirect()->route('system_admin.web_settings.faq.index');
    }

    public function edit(Faq $faq){
        return view('system_admin.web_settings.faq.edit')->with([
            "faq"=> $faq,
        ]);
    }

    public function store(FaqRequest $request){
        $request->store();
        return redirect()->route('system_admin.web_settings.faq.index');
    }

    public function destroy(Faq $faq){
        $faq->delete();
        return redirect()->route('system_admin.web_settings.faq.index'); 
    }
}
