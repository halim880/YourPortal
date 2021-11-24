
@extends('new_layout.app')

@section('content')
    

<!-- NAVBAR START -->
@include('landing.partials._navbar')
<!-- NAVBAR END -->

<!-- START HERO -->
@include('landing.partials._hero')
<!-- END HERO -->

@include('landing.partials._services')

<!-- END PRICING -->
@include('landing.partials._pricing')



<!-- START FAQ -->
@include('landing.partials._faqs')
<!-- END FAQ -->


<!-- START CONTACT -->
@include('landing.partials._contact')
@include('landing.partials._footer')


@endsection