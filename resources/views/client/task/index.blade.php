@extends('layouts.backend.client')

@section('content')

  @if (Session::has('message'))
    {{$message}}
  @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>List of tasks</h2>
                <table class="table">
                  <thead>
                      <th>title</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      @foreach ($tasks as $task)
                          <tr>
                              <td>{{$task->title}}</td>
                              <td>{{$task->description}}</td>
                              <td>
                                  Assigned
                              </td>
                              <td>
                                  <a href="" class="btn btn-primary">Edit</a>
                                  <a href="" class="btn btn-danger">Delete</a>
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