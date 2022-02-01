<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PricingController extends Controller
{
    public function index(){
        return view('system_admin.pricing.index')->with([
            'pricings'=> Pricing::all(),
        ]);
    }

    public function store(Request $request){
        Pricing::create([
            'package_id' => $request->package_id,
            'plan_id' => $request->plan_id,
            'price' => $request->price,
            'currency_id' => $request->currency_id
        ]);

        Session::flash("success", "Pricing created successfully");

        return redirect()->route('system_admin.pricing.index');
    }

    public function create(){
        return view('system_admin.pricing.create')->with([
            'packages'=> Package::all(),
            'plans'=> Plan::all(),
            'currencies'=> Currency::all(),
        ]);
    }

    public function edit(pricing $pricing){
        return view('system_admin.pricing.edit')->with([
            'pricing'=> $pricing,
            'packages'=> Package::all(),
            'plans'=> Plan::all(),
            'currencies'=> Currency::all(),
        ]);
    }

    public function update(pricing $pricing, Request $request){
        $pricing->package_id = $request->package_id;
        $pricing->plan_id = $request->plan_id;
        $pricing->price = $request->price;
        $pricing->currency_id = $request->currency_id;

        $pricing->update();

        Session::flash("success", "Pricing updated successfully");

        return redirect()->route('system_admin.pricing.index');
    }

    public function destroy(pricing $pricing){
        $pricing->delete();

        Session::flash("success", "pricing deleted successfully");
        return redirect()->route('system_admin.pricing.index');
    }
}
