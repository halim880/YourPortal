<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function index(){
        return view('system_admin.plan.index')->with([
            'plans'=> Plan::all(),
        ]);
    }

    public function store(Request $request){
        Plan::create([
            'name'=> $request->plan_name,
            'duration'=> $request->duration,
        ]);

        Session::flash("success", "plan created successfully");

        return redirect()->route('system_admin.plan.index');
    }

    public function create(){
        return view('system_admin.plan.create');
    }

    public function edit(Plan $plan){
        return view('system_admin.plan.edit')->with([
            'plan'=> $plan
        ]);
    }

    public function update(Plan $plan, Request $request){
        $plan->name = $request->plan_name;
        $plan->duration = $request->duration;

        $plan->update();

        Session::flash("success", "plan updated successfully");

        return redirect()->route('system_admin.plan.index');
    }

    public function destroy(Plan $plan){
        $plan->delete();

        Session::flash("success", "plan deleted successfully");
        return redirect()->route('system_admin.plan.index');
    }
}
