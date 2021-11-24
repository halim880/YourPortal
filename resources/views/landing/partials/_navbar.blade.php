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
                    <a class="btn btn-success btn-sm" href="{{route('login')}}">Login</a>
                    @endguest
                    @auth
                        <a class="nav-link" href="{{route('super_admin.dashboard')}}">Dashboard</a>
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