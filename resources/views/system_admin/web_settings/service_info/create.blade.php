@extends('layouts.backend.system_admin')

@section('content')
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Create Service Info</h3>
        </div>
        <div class="card-body">
          <form action="{{route('system_admin.web_settings.service_info.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="title">title </label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group mb-3">
              <label for="details">Details </label>
              <textarea class="form-control" name="details" id="details" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="priority">Priority </label>
              <select class="form-control" name="priority" id="">
                <option value="1" selected>High</option>
                <option value="3">Medium</option>
                <option value="4">Low</option>
              </select>
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