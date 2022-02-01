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
                    <h4>plans</h4>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.plan.create')}}">Add New plan</a>
                </div>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->id}}</td>
                            <td>{{$plan->name}}</td>
                            <td>{{$plan->duration}}</td>
                            <td>
                                <a href="{{route('system_admin.plan.edit', $plan)}}" class="btn btn-primary btn-sm mt-1">Edit</a>
                                <a href="{{route('system_admin.plan.destroy', $plan)}}" class="btn btn-warning btn-sm mt-1">Delete</a>
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