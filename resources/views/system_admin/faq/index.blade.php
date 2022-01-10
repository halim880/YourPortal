@extends('layouts.backend.system_admin')

@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h3 class="">List of FAQs</h2>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.faq.create')}}">Add New FAQ</a>
                </div>
                <table class="table">
                  <thead>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Priority</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      
                    @if ($faqs->count()<1)
                    <tr>
                        <td colspan="4" class="text-center"><b>No FAQs</b></td>
                    </tr>
                    @endif
                  
                      @foreach ($faqs as $faq)
                          <tr>
                              <td>{{$faq->question}}</td>
                              <td>{{$faq->answer}}</td>
                              <td>{{$faq->priority}}</td>
                              <td>
                                  <a href="" class="btn btn-primary">Edit</a>
                                  <a href="" class="btn btn-warning">Delete</a>
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