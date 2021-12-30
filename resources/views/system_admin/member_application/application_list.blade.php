@extends('layouts.backend.system_admin')

@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-3">
                <h3>Member's Requests</h3>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Bussiness name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Admin</th>
                            <th>Admmin email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach ($applications as $application)
                        <tr>
                            <td>{{$application->name}}</td>
                            <td>{{$application->bussiness_email}}</td>
                            <td>{{$application->bussiness_phone}}</td>
                            <td>{{$application->admin_name}}</td>
                            <td>{{$application->admin_email}}</td>
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
                                <a href="{{route('bussiness_application.approve', $application)}}" class="btn btn-sm btn-success">Approve</a>
                                <a href="{{route('bussiness.application.reject', $application)}}" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div> 
@endsection