
@extends('layouts.backend._member')

@section('content')
<div class="row mt-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body p-4">
              <h2>List of Users</h2>
              <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                  @if ($users->count()<1)
                  <tr>
                      <td colspan="3" class="text-center"><b>No user is registered yet</b></td>
                  </tr>
                  @endif
                
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->getRoleNames()[0]}}</td>
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