<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
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
                    <span> Chat </span>
                </a>
            </li>

            @if (Auth::user()->isAdmin())
                <li class="side-nav-item">
                    <a href="{{URL::to('/invite-user')}}" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Invite User </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="apps-chat.html" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> Clients </span>
                    </a>
                </li>
            @endif

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-projects-list.html">List</a>
                        </li>
                        @if (Auth::user()->isAdmin())
                            <li>
                                <a href="apps-projects-add.html">Create Project <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
            @if (Auth::user()->isSuperAdmin())
                <li class="side-nav-item">
                    <a href="{{URL::to('/invite-member')}}" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Invite Member</span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarMembers" aria-expanded="false" aria-controls="sidebarMembers" class="side-nav-link">
                        <i class="uil-briefcase"></i>
                        <span> Members </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMembers">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="apps-projects-list.html">List</a>
                            </li>
                            
                                <li>
                                    <a href="{{route('admin.dashboard.applications')}}">Requests <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                                </li>
                            
                        </ul>
                    </div>
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
                            <a href="{{route('client.tasks.index')}}">List</a>
                        </li>

                        <li>
                            <a href="{{route('client.tasks.create')}}">Create Task <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>