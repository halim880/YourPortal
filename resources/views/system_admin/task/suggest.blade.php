 
@extends('layouts.backend.system_admin')
@section('content')
  
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          @if (Session::has('message'))
          <div class="alert alert-warning">
            <p class="">{{Session::get('message')}}</p>
          </div>
          @endif
          <h3>Select Member to suggest the task</h3>
          <form action="{{route('system_admin.task.suggest.send')}}" method="post">
            @csrf
            <input type="text" name="task_id" value="{{$task_id}}" style="display: none">
            <div class="form-group mb-3">
              <select name="member_id" id="member" class="form-control">
                @foreach ($members as $member)
                    <option value="{{$member->id}}">{{$member->name}}</option>
                @endforeach
              </select>
            </div>
              <div class="d-flex my-2">
                  <button type="submit" class="btn btn-primary">Send suggestion</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection