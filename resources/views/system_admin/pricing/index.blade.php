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
                    <h4>Pricings</h4>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.pricing.create')}}">Add New pricing</a>
                </div>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Package</th>
                        <th>Plan</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($pricings->count()<1)

                            <tr>
                                <td align="center" colspan="6">No Pricing created</td>
                            </tr>                            

                        @else
                            @foreach ($pricings as $pricing)
                            <tr>
                                <td>{{$pricing->id}}</td>
                                <td>{{$pricing->getPackageName()}}</td>
                                <td>{{$pricing->getPlanName()}}</td>
                                <td>{{$pricing->currency->symbol}} {{$pricing->price}}</td>
                                <td>
                                    <a href="{{route('system_admin.pricing.edit', $pricing)}}" class="btn btn-primary btn-sm mt-1">Edit</a>
                                    <a href="{{route('system_admin.pricing.destroy', $pricing)}}" class="btn btn-warning btn-sm mt-1">Delete</a>
                                </td>
                            </tr>                            
                            @endforeach
                        @endif
                    </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection