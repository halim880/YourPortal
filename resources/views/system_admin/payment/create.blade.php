@extends('layouts.backend.system_admin')

@section('content')

  @if (Session::has('message'))
    @include('alerts._success')
  @endif
  
  <div class="row mt-2">
      <div class="col-md-5">
          <div class="card">
              <div class="card-body p-4">
                <h2>Receive Payment</h2>
                <form action="{{route('system_admin.package.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="member_id">Member ID</label>
                      <input type="number" class="form-control" id="member_id" name="member_id" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment_method">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="bank">Bank</option>
                        </select>
                      </div>

                      <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                      </div>

                      <div class="form-group mb-3">
                        <label for="currency_id">Currency</label>
                        <select name="currency_id" id="currency_id" class="form-control">
                            @foreach ($currencies as $currency)
                                <option value="{{$currency->id}}">{{$currency->name}}</option>
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