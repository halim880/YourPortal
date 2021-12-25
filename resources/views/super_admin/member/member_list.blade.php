@extends('layouts.backend.super_admin')

@section('content')

  @if (Session::has('message'))
    {{$message}}
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>List of Members</h2>
                <table class="table">
                  <thead>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      
                    @if ($members->count()<1)
                    <tr>
                        <td colspan="3" class="text-center"><b>No member is registered yet</b></td>
                    </tr>
                    @endif
                  
                      @foreach ($members as $member)
                          <tr>
                              <td>{{$member->name}}</td>
                              <td>{{$member->member_email}}</td>
                              <td>{{$member->member_phone}}</td>
                              <td>
                                  <a href="" class="btn btn-primary">View</a>
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