@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>Create plan</h2>
                <form action="{{route('system_admin.plan.update', $plan)}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="plan_name">plan Name</label>
                      <input type="text" class="form-control" id="plan_name" name="plan_name" required value="{{$plan->name}}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="duration">Duration</label>
                        <input type="number" class="form-control" id="duration" name="duration" required value="{{$plan->duration}}">
                      </div>

                    <div class="d-flex my-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
              </div>
          </div>
      </div>
  </div>
@endsection