<?php

use App\Http\Controllers\Client\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberUserController;
use App\Http\Controllers\Member\TaskController as MemberTaskController;
use App\Http\Controllers\MemberApplicationController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberInvitationController;
use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\StoreUserController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\TaskController as SuperAdminTaskController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------------------------------------
| Guest
|----------------------------------------------------------------------------------------------------
*/
Route::resource('clients', ClientController::class);

Route::get('/', [WebController::class, 'landingPage']);
Route::get('/home', [WebController::class, 'home'])->name('home');

Route::get('/free-register', [MemberController::class, 'create'])->name('member.create');
Route::post('member/store', [MemberController::class, 'store'])->name('member.store');

Route::post('/member/application', [MemberApplicationController::class, 'store'])->name('member_application.store');

Route::post('user/stroe', [StoreUserController::class, 'storeInvitedUser'])->name('invited_user.store');

/*
|----------------------------------------------------------------------------------------------------
| Super Admin
|----------------------------------------------------------------------------------------------------
*/
Route::prefix('/super_admin')->name('super_admin.')->middleware('super_admin')->group(function(){
    Route::post('role-create', [RoleController::class, 'store'])->name('role.store');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/member-list', [DashboardController::class, 'memberList'])->name('member_list');

    //Member Application
    Route::get('/member/{application}', [MemberApplicationController::class, 'show'])->name('member_application.show');
    Route::get('/approve/{application}', [MemberApplicationController::class, 'approve'])->name('member_application.approve');
    Route::get('/reject/{application}', [MemberApplicationController::class, 'reject'])->name('member_application.reject');
    Route::get('/member-applications', [MemberApplicationController::class, 'applicationList'])->name('member_applications');

    
    
    //Task
    Route::get('/task-list', [SuperAdminTaskController::class, 'taskList'])->name('task.list');
    Route::get('/task-suggest', [SuperAdminTaskController::class, 'taskSuggest'])->name('task.suggest');
    Route::post('/task-suggest', [SuperAdminTaskController::class, 'taskSuggetionSend'])->name('task.suggest.send');


    // Route::get('/member-list', [MemberController::class, 'memberList'])->name('member_list');
});

/*
|----------------------------------------------------------------------------------------------------
| Member
|----------------------------------------------------------------------------------------------------
*/
Route::prefix('member/')->name('member.')->middleware('admin')->group(function(){
    Route::get('/member-dashboard', [MemberDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('invite-user', [MemberDashboardController::class, 'createInvitation'])->name('invite_user');

    Route::post('send/invitation', [MemberInvitationController::class, 'inviteUser'])->name('send.invitation');

    Route::get('suggested-task', [MemberTaskController::class, 'suggested'])->name('task.suggested');

    Route::get('/member-users', [MemberUserController::class, 'index'])->name('user.index');

});



Route::get('/register-user', [MemberInvitationController::class, 'createRegisterUser'])->name('invited_user.create');


// Route::post('/store-user', [MemberInvitationController::class, 'storeUser'])->name('invited_user.store');

/*
|----------------------------------------------------------------------------------------------------
| Client
|----------------------------------------------------------------------------------------------------
*/

Route::prefix('client/')->name('client.')->middleware('client')->group(function (){
    Route::resource('tasks', TaskController::class);
    Route::get('/dashboard', [ClientDashboardController::class, 'dashboard'])->name('dashboard');
});


Route::get('/test', function (){
    return view('test');
});