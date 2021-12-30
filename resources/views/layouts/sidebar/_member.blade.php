<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('assets/images/logo.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="apps-chat.html" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="apps-chat.html" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Message </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('member.user.index', ['m_id'=>Auth::user()->member()->id])}}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Users </span>
                </a>
            </li>

            @if (Auth::user()->isAdmin())
                <li class="side-nav-item">
                    <a href="{{route('member.invite_user')}}" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Invite User </span>
                    </a>
                </li>
            @endif


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('member.task.suggested', ['member_id'=> Auth::user()->member()->id])}}">Suggested tasks</a>
                        </li>
                        <li>
                            <a href="apps-tasks.html">On going tasks</a>
                        </li>
                        @if (Auth::user()->isUser())
                            <li>
                                <a href="{{route('member.user.tasks.assigned')}}">Your tasks</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>