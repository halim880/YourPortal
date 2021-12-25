@extends('layouts.backend.super_admin')

@section('content')

  @if (Session::has('message'))
    {{Session::get('message')}}
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
                                  @if ($task->isAssigned())
                                      Assigned
                                  @else 
                                    Not assigned
                                  @endif
                              </td>
                              <td>
                                  <a href="{{route('super_admin.task.suggest', ['task_id'=> $task->id])}}" 
                                    class="btn @if($task->isAssigned())btn-secondary desabled @else btn-primary @endif">Suggest</a>
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