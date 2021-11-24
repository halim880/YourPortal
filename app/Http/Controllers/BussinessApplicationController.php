<?php

namespace App\Http\Controllers;

use App\Events\ApplicationApprovedEvent;
use App\Models\Bussiness\BussinessApplication;
use App\Http\Requests\StoreBussinessApplicationRequest;
use App\Http\Requests\UpdateBussinessApplicationRequest;

class BussinessApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBussinessApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBussinessApplicationRequest $request)
    {
        $application = $request->store();
        return view('bussiness.application_proccessing')->with([
            'application'=> $application,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussiness\BussinessApplication  $bussinessApplication
     * @return \Illuminate\Http\Response
     */
    public function show(BussinessApplication $application)
    {
        return view('super_admin.bussiness_application.show')->with([
            'application'=> $application,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussiness\BussinessApplication  $bussinessApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(BussinessApplication $bussinessApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBussinessApplicationRequest  $request
     * @param  \App\Models\Bussiness\BussinessApplication  $bussinessApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBussinessApplicationRequest $request, BussinessApplication $bussinessApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussiness\BussinessApplication  $bussinessApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(BussinessApplication $bussinessApplication)
    {
        //
    }

    public function approve(BussinessApplication $application){
        $application->status = 'approved';
        $application->update();
        ApplicationApprovedEvent::dispatch($application);
        return redirect()->back();
    }
    public function reject(BussinessApplication $application){
        $application->status = 'rejected';
        $application->update();
        return redirect()->back();
    }
}
