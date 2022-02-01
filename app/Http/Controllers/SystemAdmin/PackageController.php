<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{

    public function index(){
        return view('system_admin.package.index')->with([
            'packages'=> Package::all(),
        ]);
    }

    public function store(Request $request){
        Package::create([
            'name'=> $request->package_name,
            'admin_limit'=> $request->admin_limit,
            'user_limit'=> $request->user_limit,
        ]);

        Session::flash("success", "Package created successfully");

        return redirect()->route('system_admin.package.index');
    }

    public function create(){
        return view('system_admin.package.create');
    }

    public function edit(Package $package){
        return view('system_admin.package.edit')->with([
            'package'=> $package
        ]);
    }

    public function update(Package $package, Request $request){
        $package->name = $request->package_name;
        $package->admin_limit = $request->admin_limit;
        $package->user_limit = $request->user_limit;
        $package->update();

        Session::flash("success", "Package updated successfully");

        return redirect()->route('system_admin.package.index');
    }

    public function destroy(Package $package){
        $package->delete();

        Session::flash("success", "Package deleted successfully");
        return redirect()->route('system_admin.package.index');
    }
}
