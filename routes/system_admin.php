<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\MemberApplicationController;
use App\Http\Controllers\SystemAdmin\DashboardController;
use App\Http\Controllers\SystemAdmin\TaskController;
use Illuminate\Support\Facades\Route;
/*
|----------------------------------------------------------------------------------------------------
| System Admin Route
|----------------------------------------------------------------------------------------------------
*/



Route::prefix('/system_admin')->name('system_admin.')->middleware('system_admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/member-list', [DashboardController::class, 'memberList'])->name('member_list');
    Route::get('/inbox', [DashboardController::class, 'inbox'])->name('inbox');
    
    //Member Application
    Route::get('/member/{application}', [MemberApplicationController::class, 'show'])->name('member_application.show');
    Route::get('/approve/{application}', [MemberApplicationController::class, 'approve'])->name('member_application.approve');
    Route::get('/reject/{application}', [MemberApplicationController::class, 'reject'])->name('member_application.reject');
    Route::get('/member-applications', [MemberApplicationController::class, 'applicationList'])->name('member_applications');
    
    //Task
    Route::get('/task-list', [TaskController::class, 'taskList'])->name('task.list');
    Route::get('/task-suggest', [TaskController::class, 'taskSuggest'])->name('task.suggest');
    Route::post('/task-suggest', [TaskController::class, 'taskSuggetionSend'])->name('task.suggest.send');
    
    // Route::get('/member-list', [MemberController::class, 'memberList'])->name('member_list');
    Route::resource('/faq', FaqController::class);
});