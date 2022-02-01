@extends('layouts.backend.system_admin')

@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-3">
                <h3>Member's Requests</h3>
                <table id="datatable-buttons" class="table table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>Member name</th>
                            <th>Email</th>
                            <th>Admin Name</th>
                            <th>Package</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @if ($applications->count()<1)
                            <tr>
                                <td colspan="5" style="text-align: center">No Member Request</td>
                            </tr>
                        @else
                            @foreach ($applications as $application)
                            <tr>
                                <td>{{$application->name}}</td>
                                <td>{{$application->member_email}}</td>
                                <td>{{$application->admin_name}}</td>
                                <td>{{$application->getPackageName()}}</td>
                                @if ($application->status=='approved')
                                    <td>
                                        <button disabled class="btn btn-secondary">Approved</button>
                                    </td>
                                @elseif($application->status=='rejected')
                                    <td>
                                        <button disabled class="btn btn-warning">Rejected</button>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{route('system_admin.member_application.approve', $application)}}" class="btn btn-sm btn-success">Approve</a>
                                        <a href="{{route('system_admin.member_application.reject', $application)}}" class="btn btn-sm btn-danger">Reject</a>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div> 
@endsection