<?php

namespace App\Http\Controllers;

use App\Events\ApplicationApprovedEvent;
use App\Events\UserCreatedEvent;
use App\Helpers\UserRole;
use App\Models\Member\MemberApplication;
use App\Http\Requests\StoreMemberApplicationRequest;
use App\Http\Requests\UpdateMemberApplicationRequest;
use App\Mail\ApplicationApprovedMail;
use App\Models\Member;
use App\Models\Package;
use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class MemberApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applicationList()
    {
        return view('system_admin.member_application.application_list')->with([
            'applications'=> MemberApplication::latest()->get(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberApplicationRequest $request)
    {
        $application = $request->store();
        return view('member.application_proccessing')->with([
            'application'=> $application,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussiness\MemberApplication  $MemberApplication
     * @return \Illuminate\Http\Response
     */
    public function show(MemberApplication $application)
    {
        return view('system_admin.member_application.show')->with([
            'application'=> $application,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussiness\MemberApplication  $MemberApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberApplication $MemberApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberApplicationRequest  $request
     * @param  \App\Models\Bussiness\MemberApplication  $MemberApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberApplicationRequest $request, MemberApplication $MemberApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussiness\MemberApplication  $MemberApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberApplication $MemberApplication)
    {
        //
    }

    public function approve(MemberApplication $application){

        DB::transaction(function() use($application){
            $pass = Str::random(6);

            $user = User::create([
                'name'=> $application->admin_name,
                'email'=> $application->admin_email,
                'password'=> bcrypt($pass),
            ]);

            $member = Member::create([
                'admin_id'=> $user->id,
                'name'=> $application->name,
                'member_email'=> $application->member_email,
                'member_phone'=> $application->member_phone,
            ]);
            
            $package = Package::first();
            
            SubscriptionService::createSubscription($member, $application->package_id, $application->plan_id);

            $user->assignRole(UserRole::MEMBER_SUPER_ADMIN);

            UserCreatedEvent::dispatch($user);

            $application->status = 'approved';
            $application->update();

            Mail::to($user->email)->send(new ApplicationApprovedMail($user, $pass));
        });


        return redirect()->back();
    }
    public function reject(MemberApplication $application){
        $application->status = 'rejected';
        $application->update();
        return redirect()->back();
    }
}
