
@extends('layouts.frontend.app')

@section('content')

<!-- NAVBAR START -->
@include('web.partials._navbar')
<!-- NAVBAR END -->

<!-- START HERO -->
@include('web.partials._hero')
<!-- END HERO -->

@include('web.partials._services')

<!-- END PRICING -->
@include('web.partials._pricing')

<!-- START FAQ -->
@include('web.partials._faqs')
<!-- END FAQ -->


<!-- START CONTACT -->
@include('web.partials._contact')
@include('web.partials._footer')


@endsection