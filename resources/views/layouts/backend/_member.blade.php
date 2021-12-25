@extends('layouts.base')

@section('root')

    @include('layouts.sidebar._member')

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('layouts.partials._topbar')

            @yield('content')

        </div>
        <!-- content -->
        @include('layouts.partials._footer')
    </div>
@endsection