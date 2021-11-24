@extends('new_layout.app')
@section('content')
        <!-- Registration Form Section -->
        <section id="bussiness_registration">
            <div class="container">
              <form action="{{route('bussiness_application.store')}}" method="post">
                @csrf
                <div class="row">
                  <h1 style="margin-bottom:40px; text-align:center" class="form-heading">Register Your Bussiness</h1>
                  <div class="col-md-6">

                      {{-- Bussiness Info --}}
                      <h3>Bussiness Information</h3>
                      <div id="bussiness_info">
                        <hr>
                        <div class="form-group mb-3">
                            <label for="name">Bussiness Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                          <label for="email">Bussiness Email</label>
                          <input type="email" class="form-control" id="email" name="bussiness_email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Bussiness Phone</label>
                            <input type="text" class="form-control" id="phonenumber" required name="bussiness_phone">
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
                          <input type="text" class="form-control" id="admin_name" name="admin_name" required>
                      </div>
                      <div class="form-group mb-3">
                        <label for="email">Bussiness Email</label>
                        <input type="email" class="form-control" id="email" name="admin_email" required>
                      </div>
                    </div>
                </div>
                  
                      <div class="d-flex my-2">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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