
@extends('layouts.backend.super_admin')

@section('content')
    <div class="">
        <div class="container">
            <h1>New bussiness Application</h1>
            <table class="table">
                <tr>
                    <td>Bussiness Name : </td>
                    <td>{{$application->name}}</td>
                </tr>
                <tr>
                    <td>Bussiness Email : </td>
                    <td>{{$application->bussiness_email}}</td>
                </tr>
                <tr>
                    <td>Bussiness Phone : </td>
                    <td>{{$application->bussiness_phone}}</td>
                </tr>
                <tr>
                    <td>Admin name</td>
                    <td>{{$application->admin_name}}</td>
                </tr>
                <tr>
                    <td>Admin name</td>
                    <td>{{$application->admin_email}}</td>
                </tr>
            </table>
            <a href="{{route('super_admin.member_application.approve', $application)}}" class="approve-btn">Approve</a>
            <a href="{{route('super_admin.member_application.approve', $application)}}" class="reject-btn">Reject</a>
        </div>
    </div>
@endsection

<style>
    .container{
        margin-top: 50px;
        margin-left: 30px;
    }
    .table{
        width: 500px !important;
    }

    
</style>