<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        return view('super_admin.faq.index')->with([
            'faqs'=> Faq::orderBy('priority', 'ASC')->get(),
        ]);
    }
    
    public function create(){
        return view('super_admin.faq.create');
    }

    public function update(){
        return view('super_admin.faq.update');
    }

    public function store(FaqRequest $request){
        $request->store();
        return redirect()->back();
    }
}
