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
                    <h4>Payment History</h4>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.package.create')}}">Add New Package</a>
                </div>
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection