@extends('new_layout.app')
@section('content')
        <!-- Registration Form Section -->
        <section id="bussiness_registration">
            <div class="container">
             <div class="card">
               <div class="card-body p-4">

                <form action="{{route('member_application.store')}}" method="post">
                  @csrf
                  <div class="row">
                    <h1 style="margin-bottom:40px; text-align:center" class="form-heading">Register as a Member</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
  
                        {{-- Bussiness Info --}}
                        <h3>Bussiness Information</h3>
                        <div id="bussiness_info">
                          <hr>
                          <div class="form-group mb-3">
                              <label for="name">Bussiness Name</label>
                              <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                          </div>
                          <div class="form-group mb-3">
                            <label for="email">Bussiness Email</label>
                            <input type="email" class="form-control" id="email" name="bussiness_email" required value="{{old('bussiness_email')}}">
                          </div>
                          <div class="form-group mb-3">
                              <label for="exampleInputEmail1">Bussiness Phone</label>
                              <input type="text" class="form-control" id="phonenumber" required name="bussiness_phone" value="{{old('bussiness_phone')}}">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      {{-- Admin Info --}}
                      <h3>Admin Information</h3>
                      <div id="admin_info">
                        <hr>
                        <div class="form-group mb-3">
                            <label for="admin_name">Admin Name</label>
                            <input type="text" class="form-control" id="admin_name" name="admin_name" required value="{{old('admin_name')}}">
                        </div>
                        <div class="form-group mb-3">
                          <label for="email">Bussiness Email</label>
                          <input type="email" class="form-control" id="email" name="admin_email" required value="{{old('admin_email')}}">
                        </div>
                      </div>
                  </div>
                    
                        <div class="d-flex my-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
               </div>
             </div>
              </div>
        </section>
@endsection

<style>
    #bussiness_registration{
      font-family: 'Poppins', serif;
      margin-top: 50px;
      min-height: 90vh;
    }

    #bussiness_registration .bussiness_registration{
      
    }

    .hide{
      display: none;
    }

</style>