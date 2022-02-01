<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\ServiceInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceInfoController extends Controller
{
    public function index(){
        return view('system_admin.web_settings.service_info.index')->with([
            'serviceInfos'=> ServiceInfo::all(),
        ]);
    }

    public function store(Request $request){
        ServiceInfo::create([
            'title'=> $request->title,
            'details'=> $request->details,
            'priority'=> $request->priority,
        ]);

        Session::flash("success", "Service info created successfully");

        return redirect()->route('system_admin.web_settings.service_info.index');
    }

    public function create(){
        return view('system_admin.web_settings.service_info.create');
    }

    public function edit(ServiceInfo $serviceInfo){
        return view('system_admin.web_settings.service_info.edit')->with([
            'serviceInfo'=> $serviceInfo
        ]);
    }

    public function update(ServiceInfo $serviceInfo, Request $request){
        $serviceInfo->title = $request->title;
        $serviceInfo->details = $request->details;
        $serviceInfo->priority = $request->priority;

        $serviceInfo->update();

        Session::flash("success", "Service Info updated successfully");

        return redirect()->route('system_admin.web_settings.service_info.index');
    }

    public function destroy(ServiceInfo $serviceInfo){
        $serviceInfo->delete();

        Session::flash("success", "Service info deleted");
        return redirect()->route('system_admin.web_settings.service_info.index');
    }
}
