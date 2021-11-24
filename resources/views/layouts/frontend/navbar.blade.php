
<ul class="navbar-nav ms-auto my-3 my-lg-0">
    <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Support</a></li>
    <li class="nav-item"><a class="nav-link me-lg-3" href="#download">Contact</a></li>
    <li class="nav-item"><a class="nav-link me-lg-3" href="#download">F.A.Q.S</a></li>

    @guest
        <li class="nav-item"><a style="color: white" class="nav-link btn btn-primary" href="{{route('login')}}">Login</a></li>
    @endguest

    @auth
        <li class="nav-item"><a class="nav-link me-lg-3" href="{{route('super_admin.dashboard')}}">My Account</a></li>
    @endauth
</ul>