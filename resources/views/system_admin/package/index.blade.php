@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                  <div class="d-flex justify-content-between">
                    <h4>Packages</h4>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.package.create')}}">Add New Package</a>
                </div>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Admin limit</th>
                        <th>User limit</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($packages as $package)
                        <tr>
                            <td>{{$package->name}}</td>
                            <td>{{$package->admin_limit}}</td>
                            <td>{{$package->user_limit}}</td>
                            <td>
                                <a href="{{route('system_admin.package.edit', $package)}}" class="btn btn-primary btn-sm mt-1">Edit</a>
                                <a href="{{route('system_admin.package.destroy', $package)}}" class="btn btn-warning btn-sm mt-1">Delete</a>
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