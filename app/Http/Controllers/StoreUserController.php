<?php

namespace App\Http\Controllers;

use App\Http\Requests\InivitedUserRequest;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    public function storeInvitedUser(InivitedUserRequest $request){
        $request->storeUser();
        return redirect()->route('login');
    }
}
