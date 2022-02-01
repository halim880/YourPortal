@extends('layouts.backend.system_admin')

@section('content')
    @if (Session::has('success'))
        @include('alerts.success')
    @endif
  
  <div class="row mt-2">
      <div class="col-md-10">
          <div class="card">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h3 class="">List of FAQs</h2>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.web_settings.faq.create')}}">Add New FAQ</a>
                </div>
                <table class="table">
                  <thead>
                      <th>Index</th>
                      <th class="col-3">Question</th>
                      <th class="col-5">Answer</th>
                      <th class="col-1">Priority</th>
                      <th class="col-3">Actions</th>
                  </thead>
                  <tbody>
                      
                    @if ($faqs->count()<1)
                    <tr>
                        <td colspan="4" class="text-center"><b>No FAQs</b></td>
                    </tr>
                    @endif
                  
                      @foreach ($faqs as $faq)
                          <tr>
                              <td >{{$loop->index + 1}}</td>
                              <td >{{$faq->question}}</td>
                              <td >{{$faq->answer}}</td>
                              <td >{{$faq->getPriority()}}</td>
                              <td>
                                  <a href="{{route('system_admin.web_settings.faq.edit', $faq)}}" class="btn btn-primary btn-sm mt-1">Edit</a>
                                  <a href="{{route('system_admin.web_settings.faq.destroy', $faq)}}" class="btn btn-warning btn-sm mt-1">Delete</a>
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