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
                    <h3 class="">Service infos</h2>
                    <a class="btn btn-primary p-2" href="{{route('system_admin.web_settings.service_info.create')}}">Add New Service Info</a>
                </div>
                <table class="table">
                  <thead>
                      <th>Index</th>
                      <th class="col-3">Title</th>
                      <th class="col-5">Details</th>
                      <th class="col-1">Priority</th>
                      <th class="col-3">Actions</th>
                  </thead>
                  <tbody>
                      
                    @if ($serviceInfos->count()<1)
                    <tr>
                        <td colspan="5" class="text-center"><b>No Service Info</b></td>
                    </tr>
                    @endif
                  
                      @foreach ($serviceInfos as $serviceInfo)
                          <tr>
                              <td >{{$loop->index + 1}}</td>
                              <td >{{$serviceInfo->title}}</td>
                              <td >{{$serviceInfo->details}}</td>
                              <td >{{$serviceInfo->getPriority()}}</td>
                              <td>
                                  <a href="{{route('system_admin.web_settings.service_info.edit', $serviceInfo)}}" class="btn btn-primary btn-sm mt-1">Edit</a>
                                  <a href="{{route('system_admin.web_settings.service_info.destroy', $serviceInfo)}}" class="btn btn-warning btn-sm mt-1">Delete</a>
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