<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar"> 
                    <img src="assets/images/profile.png" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{Auth::user()->name}}</span>
                    <span class="account-position">
                        @if (Auth::user()->isAdmin())
                            Admin
                        @elseif (Auth::user()->isUser())
                            User
                        @elseif (Auth::user()->isClient())
                            Client
                        @endif
                    </span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy me-1"></i>
                    <span>Support</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline me-1"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <button onclick="submit()" class="btn dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </button>

                <form action="{{route('logout')}}" method="post" style="display: none;" id="logout-form">@csrf</form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>

<script>
    function submit() {
        document.getElementById('logout-form').submit();
    }
</script>