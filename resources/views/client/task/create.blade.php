@extends('layouts.backend.client')

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
          <form action="{{route('client.tasks.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="title">Task title </label>
              <input type="title" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group mb-3">
              <label for="description">Description </label>
              <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="d-flex my-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection