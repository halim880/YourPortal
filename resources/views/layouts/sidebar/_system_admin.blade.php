<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light mt-3">
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
                <a href="{{route('system_admin.dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
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
                            <a href="{{route('system_admin.member_list')}}">List</a>
                        </li>
                        <li>
                            <a href="{{route('system_admin.member_applications')}}">Requests <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPackage" aria-expanded="false" aria-controls="sidebarPackage" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Package </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPackage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('system_admin.package.index')}}">List</a>
                        </li>
                        <li>
                            <a href="{{route('system_admin.plan.index')}}">Plans</a>
                        </li>
                        <li>
                            <a href="{{route('system_admin.pricing.index')}}">Pricing</a>
                        </li>
                    </ul>
                </div>
            </li>

            

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPayment" aria-expanded="false" aria-controls="sidebarPayment" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Payment </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPayment">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('system_admin.payment.index')}}">Payment History</a>
                        </li>
                        <li>
                            <a href="{{route('system_admin.payment.create')}}">Receive Payment</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarWeb" aria-expanded="false" aria-controls="sidebarWeb" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span>Web Settings</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarWeb">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('system_admin.web_settings.faq.index')}}">FAQs</a>
                        </li>
                        <li>
                            <a href="{{route('system_admin.web_settings.service_info.index')}}">Service Info</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>