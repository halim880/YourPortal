<?php

namespace App\Http\Controllers;

use App\Events\ApplicationApprovedEvent;
use App\Models\Member\MemberApplication;
use App\Http\Requests\StoreMemberApplicationRequest;
use App\Http\Requests\UpdateMemberApplicationRequest;

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
        $application->status = 'approved';
        $application->update();
        ApplicationApprovedEvent::dispatch($application);
        return redirect()->back();
    }
    public function reject(MemberApplication $application){
        $application->status = 'rejected';
        $application->update();
        return redirect()->back();
    }
}
