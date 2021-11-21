<?php

use App\Http\Controllers\BussinessController;
use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home_page.home_page');
});

Route::get('/home', function (){
    return "loged in";
})->name('home');

Route::middleware('super_admin')->group(function(){
    Route::post('role/create', [RoleController::class, 'store'])->name('role.store');
});

Route::post('bussiness/store', [BussinessController::class, 'store'])->name('bussiness.store');