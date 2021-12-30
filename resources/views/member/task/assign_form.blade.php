 
@extends('layouts.backend._member')
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
          <h3>Select user to assign the task</h3>
          <form action="{{route('member.task.assign')}}" method="post">
            @csrf
            <input type="text" name="task_id" value="{{$task_id}}" style="display: none">
            <input type="number" name="member_id" value="{{Auth::user()->member()->id}}" style="display: none">
            <div class="form-group mb-3">
              <select name="user_id" id="member" class="form-control">
                @if ($users->count()>0)
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                @endif
              </select>
            </div>
              <div class="d-flex my-2">
                  <button type="submit" class="btn btn-primary">Assign</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection