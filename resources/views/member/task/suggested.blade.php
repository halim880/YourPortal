@extends('layouts.backend._member')

@section('content')
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <h2>List of Tasks</h2>
                <table class="table">
                  <thead>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      
                    @if ($tasks->count()<1)
                    <tr>
                        <td colspan="3" class="text-center"><b>No Suggested Tasks</b></td>
                    </tr>
                    @endif
                  
                      @foreach ($tasks as $task)
                          <tr>
                              <td>{{$task->title}}</td>
                              <td>{{$task->description}}</td>
                              <td>
                                  <a href="" class="btn btn-primary">View</a>
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