@extends('layouts.frontend.app')
@section('content')
        <!-- Registration Form Section -->
        <section id="registration_form">
            <div class="container">
                <form>
                    <h1 class="form-heading">Register</h1>
                    <hr>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phonenumber">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control">
                      </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Confirm password</label>
                        <input type="password" class="form-control">
                      </div>
                    <div class="d-flex my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{URL::to("/login")}}" class="px-3">Already Registered?</a>
                    </div>
                    
                  </form>
            </div>
        </section>
@endsection