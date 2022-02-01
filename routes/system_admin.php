<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\MemberApplicationController;
use App\Http\Controllers\SystemAdmin\DashboardController;
use App\Http\Controllers\SystemAdmin\PackageController;
use App\Http\Controllers\SystemAdmin\PaymentController;
use App\Http\Controllers\SystemAdmin\PlanController;
use App\Http\Controllers\SystemAdmin\PricingController;
use App\Http\Controllers\SystemAdmin\ServiceInfoController;
use App\Http\Controllers\SystemAdmin\SystemAdminMemberController;
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
    Route::get('/member/{member}/show', [SystemAdminMemberController::class, "show"])->name('member.show');
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

    // Package
    Route::get('/package/index', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/{package}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/package/update', [PackageController::class, 'update'])->name('package.update');
    Route::get('/package/{package}/destroy', [PackageController::class, 'destroy'])->name('package.destroy');

    // Plan
    Route::get('/plan/index', [PlanController::class, 'index'])->name('plan.index');
    Route::get('/plan/create', [PlanController::class, 'create'])->name('plan.create');
    Route::post('/plan/store', [PlanController::class, 'store'])->name('plan.store');
    Route::get('/plan/{plan}/edit', [PlanController::class, 'edit'])->name('plan.edit');
    Route::post('/plan/{plan}/update', [PlanController::class, 'update'])->name('plan.update');
    Route::get('/plan/{plan}/destroy', [PlanController::class, 'destroy'])->name('plan.destroy');

    // Pricing
    Route::get('/pricing/index', [PricingController::class, 'index'])->name('pricing.index');
    Route::get('/pricing/create', [PricingController::class, 'create'])->name('pricing.create');
    Route::post('/pricing/store', [PricingController::class, 'store'])->name('pricing.store');
    Route::get('/pricing/{pricing}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
    Route::post('/pricing/{pricing}/update', [PricingController::class, 'update'])->name('pricing.update');
    Route::get('/pricing/{pricing}/destroy', [PricingController::class, 'destroy'])->name('pricing.destroy');

    // Payment
    Route::get('/payment/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payment/{payment}/update', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payment/{payment}/destroy', [PaymentController::class, 'destroy'])->name('payment.destroy');

    Route::prefix('/web-settings')->name('web_settings.')->group(function(){

        // FAQs
        Route::post("/faq/{faq}/update", [FaqController::class, "update"])->name("faq.update");
        Route::get("/faq/{faq}/destroy", [FaqController::class, "destroy"])->name("faq.destroy");
        Route::resource('/faq', FaqController::class)->except(['update', 'destroy']);

        // Service Info
        Route::post("/service_info/{serviceInfo}/update", [ServiceInfoController::class, "update"])->name("service_info.update");
        Route::get("/service_info/{serviceInfo}/destroy", [ServiceInfoController::class, "destroy"])->name("service_info.destroy");
        Route::resource('/service_info', ServiceInfoController::class)->except(['update', 'destroy']);

    });
});