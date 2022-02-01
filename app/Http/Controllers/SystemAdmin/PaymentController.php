<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(){
        return view('system_admin.payment.index')->with([
            'payments'=> Payment::all(),
        ]);
    }

    public function store(Request $request){
        Payment::create([
            'name'=> $request->payment_name,
            'duration'=> $request->duration,
        ]);

        Session::flash("success", "Payment receive successfully");

        return redirect()->route('system_admin.payment.index');
    }

    public function create(){
        return view('system_admin.payment.create')->with([
            'currencies'=> Currency::all(),
        ]);
    }

    public function edit(payment $payment){
        return view('system_admin.payment.edit')->with([
            'payment'=> $payment
        ]);
    }

    public function update(payment $payment, Request $request){
        $payment->name = $request->payment_name;
        $payment->duration = $request->duration;

        $payment->update();

        Session::flash("success", "Payment updated successfully");

        return redirect()->route('system_admin.payment.index');
    }

    public function destroy(payment $payment){
        $payment->delete();

        Session::flash("success", "payment deleted successfully");
        return redirect()->route('system_admin.payment.index');
    }
}
