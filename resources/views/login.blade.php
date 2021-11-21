@extends('layouts.frontend.app')
@section('content')
    <!-- Login Form Section -->
    <section id="login_form">
        <div class="container">
            <form>
                <h1 class="form-heading">Login</h1>
                <hr>
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
                  
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                </div>
                <div class="form-group form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remeber me</label>
                </div>
                <div class="d-flex my-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div>
                    <a href="">Forgot Password?</a>
                    <br>
                    <a href="{{URL::to("register")}}">Register</a>
                </div>

              </form>
        </div>
    </section>    
@endsection