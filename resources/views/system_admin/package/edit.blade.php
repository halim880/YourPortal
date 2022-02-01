@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>Create Package</h2>
                <form action="{{route('system_admin.package.update', $package)}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="package_name">Package Name</label>
                      <input type="text" class="form-control" id="package_name" name="package_name" required value="{{$package->name}}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="admin_limit">Admin limit</label>
                        <input type="number" class="form-control" id="admin_limit" name="admin_limit" required value="{{$package->admin_limit}}">
                      </div>

                      <div class="form-group mb-3">
                        <label for="user_limit">User limit</label>
                        <input type="number" class="form-control" id="user_limit" name="user_limit" required value="{{$package->user_limit}}">
                      </div>

                    <div class="d-flex my-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
              </div>
          </div>
      </div>
  </div>
@endsection