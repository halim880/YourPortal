<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
    <div class="container">

        <!-- logo -->
        <a href="index.html" class="navbar-brand me-lg-5">
            {{-- <img src="assets/images/logo.png" alt="" class="logo-dark" height="18"> --}}
            <span class="logo-first">Your</span><span>Portal</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link active" href="">Home</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="">Support</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="">FAQs</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="">Contact</a>
                </li>
                <li class="nav-item mx-lg-1">
                    @guest
                        <li class="nav-item"><a dask="login-button" style="color: white" class="nav-link btn btn-primary" href="{{route('login')}}">Login</a></li>
                    @endguest

                    @auth
                        @if (Auth::user()->hasRole('super_admin'))
                            <li class="nav-item"><a class="nav-link me-lg-3" href="{{route('super_admin.dashboard')}}">Dashboard</a></li>
                        @elseif(Auth::user()->isAdmin() || Auth::user()->isUser())
                            <li class="nav-item"><a class="nav-link me-lg-3" href="{{route('bussiness.dashboard')}}">Dashboard</a></li>
                        @endif
                    @endauth
                </li>
            </ul>

        </div>
    </div>
</nav>

<style>
    .navbar{
        background: rgb(12, 22, 53);
    }

    .navbar-brand{
        font-size: 30px;
    }
    .logo-first{
        line-height: 30px;
        color: rgb(20, 247, 69);
    }

</style>