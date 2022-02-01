@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>List of Members</h2>
                <table class="table">
                  <thead>
                      <th>Name</th>
                      <th>Subscription Type</th>
                      <th>Expire Date</th>
                      <th>Remaining Days</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      
                    @if ($members->count()<1)
                    <tr>
                        <td colspan="5" class="text-center"><b>No member is registered yet</b></td>
                    </tr>
                    @endif
                      @foreach ($members as $member)
                          @php
                              $xDate = $member->subscription->exp_date;
                          @endphp
                          <tr>
                              <td>{{$member->name}}</td>
                              <td>{{$member->getCurrentPackageName()}}</td>
                              <td>{{$member->subscription->expireDate($xDate)}}</td>
                              <td>{{$member->subscription->remainingDays($xDate)}}</td>
                              <td>
                                  <a href="{{route('system_admin.member.show', $member)}}" class="btn btn-primary">View</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection