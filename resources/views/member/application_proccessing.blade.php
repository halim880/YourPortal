@extends('new_layout.app')

@section('content')

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-appColor">
                        <a href="index.html">
                            <span><img src="{{asset("assets/images/logo.png")}}" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center">
                            <h1 class="text-success">Hello! {{$application->admin_name}}</h1>
                            <p class="text-muted mt-3">We are processing your information. A confirmation mail will be send to <b>{{$application->admin_email}}</b></p>

                            <a class="btn btn-info mt-3" href="{{url('/')}}"><i class="mdi mdi-reply"></i> Return Home</a>
                        </div>
                    </div> <!-- end card-body-->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2021 © {{config('app.name')}}
</footer>




    {{-- <div class="container">
        <h1>Hello, {{$application->admin_name}}</h1>
        <p>Thanks for your interest</p>
        <p>We are analyzing your information. A confirmation mail will be send to {{$application->admin_email}}</p>
    </div>     --}}
@endsection