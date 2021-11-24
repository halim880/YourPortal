<?php

use App\Http\Controllers\BussinessApplicationController;
use App\Http\Controllers\BussinessController;
use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\PermissionController;
use App\Mail\ApplicationApprovedMail;
use App\Mail\BussinessApplicationReceived;
use App\Models\Bussiness\BussinessApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('landing.landing_page');
});

Route::get('/home', function (){
    return "loged in";
})->name('home');

Route::middleware('super_admin')->group(function(){
    Route::post('role/create', [RoleController::class, 'store'])->name('role.store');
});

Route::post('bussiness/store', [BussinessController::class, 'store'])->name('bussiness.store');
Route::get('/free-register', [BussinessController::class, 'create'])->name('bussiness.create');

Route::post('/bussiness/application', [BussinessApplicationController::class, 'store'])->name('bussiness_application.store');



Route::get('/super-admin', function(){
    return view('admin.dashboard');
})->name('super_admin.dashboard');

Route::get('bussiness/{application}', [BussinessApplicationController::class, 'show'])->name('bussiness.application.show');
Route::get('approve/{application}', [BussinessApplicationController::class, 'approve'])->name('bussiness_application.approve');
Route::get('reject/{application}', [BussinessApplicationController::class, 'reject'])->name('bussiness.application.reject');


Route::get('applications', function(){
    return view('admin.member_requests')->with([
        'applications'=> BussinessApplication::latest()->get(), 
    ]);
})->name('admin.dashboard.applications');

Route::get('/test', function (){
    return view('test');
});