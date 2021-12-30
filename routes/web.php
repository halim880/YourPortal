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



require_once __DIR__."/system_admin.php";




/*
|----------------------------------------------------------------------------------------------------
| Guest routes
|----------------------------------------------------------------------------------------------------
*/
Route::resource('clients', ClientController::class);

Route::get('/', [WebController::class, 'landingPage'])->name('web.landing');
Route::get('/contact', [WebController::class, 'contactPage'])->name('web.contact');
Route::get('/about', [WebController::class, 'aboutPage'])->name('web.about');
Route::get('/services', [WebController::class, 'servicePage'])->name('web.service');
Route::get('/faq', [WebController::class, 'faqPage'])->name('web.faq');
Route::get('/home', [WebController::class, 'home'])->name('home');

Route::get('/free-register', [MemberController::class, 'create'])->name('member.create');
Route::post('member/store', [MemberController::class, 'store'])->name('member.store');

Route::post('/member/application', [MemberApplicationController::class, 'store'])->name('member_application.store');

Route::post('user/stroe', [StoreUserController::class, 'storeInvitedUser'])->name('invited_user.store');



/*
|----------------------------------------------------------------------------------------------------
| Member Route
|----------------------------------------------------------------------------------------------------
*/

Route::prefix('member/')->name('member.')->group(function(){
    Route::get('/member-dashboard', [MemberDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('invite-user', [MemberDashboardController::class, 'createInvitation'])->name('invite_user');
    
    Route::post('send/invitation', [MemberInvitationController::class, 'inviteUser'])->name('send.invitation');
    
    Route::get('suggested-task', [MemberTaskController::class, 'suggested'])->name('task.suggested');
    
    Route::post('task-assign', [MemberTaskController::class, 'assign'])->name('task.assign');
    
    Route::get('/member-users', [MemberUserController::class, 'index'])->name('user.index');
    
    Route::get('/task-assigned', [MemberTaskController::class, 'assignedTasks'])->name('user.tasks.assigned');
    Route::get('/select-user/{task_id}', [MemberTaskController::class, 'taskAssignForm'])->name('task.assign_form');
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