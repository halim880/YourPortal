








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
                <form action="{{route('system_admin.pricing.update', $pricing)}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="package_id">Package</label>
                      <select name="package_id" id="package_id" class="form-control">
                        @foreach ($packages as $package)
                            <option @if ($pricing->package_id==$package->id) selected @endif value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group mb-3">
                      <label for="plan_id">Plan</label>
                      <select name="plan_id" id="plan_id" class="form-control">
                        @foreach ($plans as $plan)
                            <option @if ($pricing->plan_id==$plan->id) selected @endif value="{{$plan->id}}">{{$plan->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required value="{{$pricing->price}}">
                      </div>

                      <div class="form-group mb-3">
                        <label for="currency_id">Currency</label>
                        <select name="currency_id" id="currency_id" class="form-control">
                          @foreach ($currencies as $currency)
                              <option @if ($pricing->currency_id==$currency->id) selected @endif value="{{$currency->id}}">{{$currency->name}}</option>
                          @endforeach
                        </select>
                      </div>

                    <div class="d-flex my-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
              </div>
          </div>
      </div>
  </div>
@endsection
