@extends('new_layout.app')
@section('content')
        <!-- Registration Form Section -->
        <section id="bussiness_registration">
            <div class="container">
             <form action="{{route('clients.store')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                  <h1 style="margin-bottom:40px; text-align:center" class="form-heading">Register as a Client</h1>
                    <div class="col-md-6">
                        {{-- Bussiness Info --}}
                        <div id="bussiness_info">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" required name="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="TIN">TIN</label>
                                <input type="text" class="form-control" id="TIN" required name="TIN">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">TIN</label>
                                <input type="text" class="form-control" id="password" required name="password">
                            </div>
                        </div>
                        <div class="d-flex my-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
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