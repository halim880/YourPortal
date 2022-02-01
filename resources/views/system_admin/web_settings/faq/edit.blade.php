@extends('layouts.backend.system_admin')

@section('content')
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Create Question</h3>
        </div>
        <div class="card-body">
          <form action="{{route('system_admin.web_settings.faq.update', $faq)}}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="question">Question </label>
              <input type="text" class="form-control" id="question" name="question" required value="{{$faq->question}}">
            </div>
            <div class="form-group mb-3">
              <label for="answer">Answer </label>
              <textarea class="form-control" name="answer" id="answer" cols="30" rows="10">{{$faq->answer}}</textarea>
            </div>
            <div class="form-group mb-3">
              <label for="priority">Answer </label>
              <select class="form-control" name="priority" id="">
                <option value="1" @if ($faq->priority==1) selected @endif>High</option>
                <option value="2" @if ($faq->priority==2) selected @endif>Medium</option>
                <option value="3" @if ($faq->priority==3) selected @endif>Low</option>
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