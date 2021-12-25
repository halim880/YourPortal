
@extends('layouts.backend._member')

@section('content')

  @if (Session::has('message'))
    {{$message}}
  @endif
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Invitation</h3>
        </div>
        <div class="card-body">
          <form action="{{route('member.send.invitation')}}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
              <div class="d-flex my-2">
                  <button type="submit" class="btn btn-primary">Send invitation</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection