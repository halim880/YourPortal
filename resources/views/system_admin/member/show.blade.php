@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif

@php
    $xDate = $member->subscription->exp_date;
@endphp
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>Member Details</h2>
                <table class="table table-stripped">
                    <tr>
                        <th>Member Name</th>
                        <td>:</td>
                        <td>{{$member->name}}</td>
                    </tr>
                    <tr>
                        <th>Member phone</th>
                        <td>:</td>
                        <td>{{$member->member_phone}}</td>
                    </tr>
                    <tr>
                        <th>Member Email</th>
                        <td>:</td>
                        <td>{{$member->member_email}}</td>
                    </tr>
                    <tr>
                        <th>Package </th>
                        <td>:</td>
                        <td>{{$member->getCurrentPackageName()}}</td>
                    </tr>
                    <tr>
                        <th>Plan </th>
                        <td>:</td>
                        <td>{{$member->getCurrentPlanName()}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status </th>
                        <td>:</td>
                        <td>{{$member->getPaymentStatus()}}</td>
                    </tr>
                    <tr>
                        <th>Expire Date </th>
                        <td>:</td>
                        <td>{{$member->subscription->expireDate($xDate)}}</td>
                    </tr>
                    <tr>
                        <th>Remaining Days </th>
                        <td>:</td>
                        <td>{{$member->subscription->remainingDays($xDate)}}</td>
                    </tr>
                </table>
                <h2>Member Admin details</h2>
                <table class="table table-stripped">
                    <tr>
                        <th>Admin Name</th>
                        <td>:</td>
                        <td>{{$admin->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{$admin->email}}</td>
                    </tr>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection