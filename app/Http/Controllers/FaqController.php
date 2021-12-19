<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function store(FaqRequest $request){
        $request->store();
        return redirect()->back();
    }
}
