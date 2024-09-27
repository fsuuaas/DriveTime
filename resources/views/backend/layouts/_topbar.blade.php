<div class="page-header">

    <!-- Toggle sidebar start -->
    <div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>
    <!-- Toggle sidebar end -->

    <!-- Logo sm starts -->
    <a href="index.html" class="d-lg-none d-md-block">
        <img src="{{asset('backend/images/logo.svg')}}" class="logo-sm" alt="Bootstrap Gallery">
    </a>
    <!-- Logo sm ends -->

    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-lg-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">
            @yield('breadcrumb')
        </li>
    </ol>
    <!-- Breadcrumb end -->

    <!-- Header actions ccontainer start -->
    <div class="header-actions-container">

        <!-- Search container start -->
        <div class="search-container d-lg-block d-none">

            <!-- Search input group start -->
            <div class="input-group">
                <input type="text" class="form-control" id="searchAny" placeholder="Search anything">
                <button class="btn" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <!-- Search input group end -->

        </div>
        <!-- Search container end -->

        <!-- Leads start -->
        <a href="orders.html" class="leads d-none d-xl-flex">
            <div class="lead-details">You have <span class="count"> 21 </span> new leads </div>
            <span class="lead-icon"><i
                    class="bi bi-bell-fill animate__animated animate__swing animate__infinite infinite"></i><b
                    class="dot animate__animated animate__heartBeat animate__infinite"></b></span>
        </a>
        <!-- Leads end -->

        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown d-none d-md-block">
                <a href="#" id="countries" data-toggle="dropdown" aria-haspopup="true">
                    <img src="{{asset('backend/images/flags/1x1/br.svg')}}" class="flag-img" alt="Admin Panels" />
                </a>
                <div class="dropdown-menu dropdown-menu-end mini" aria-labelledby="countries">
                    <div class="country-container">
                        <a href="index.html">
                            <img src="{{asset('backend/images/flags/1x1/us.svg')}}" alt="Clean Admin Dashboards" />
                        </a>
                        <a href="index.html">
                            <img src="{{asset('backend/images/flags/1x1/in.svg')}}" alt="Google Dashboards" />
                        </a>
                        <a href="index.html">
                            <img src="{{asset('backend/images/flags/1x1/gb.svg')}}" alt="AI Admin Dashboards" />
                        </a>
                        <a href="index.html">
                            <img src="{{asset('backend/images/flags/1x1/tr.svg')}}" alt="Modern Dashboards" />
                        </a>
                        <a href="index.html">
                            <img src="{{asset('backend/images/flags/1x1/ca.svg')}}" alt="Best Admin Dashboards" />
                        </a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name d-none d-md-block">Abigale Heaney</span>
                    <span class="avatar">
                    <img src="{{asset('backend/images/user.png')}}" alt="Admin Templates">
                    <span class="status online"></span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <a href="profile.html">Profile</a>
                        <a href="account-settings.html">Settings</a>
                        <a href="{{ route('logout.custom')}}">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->

    </div>
    <!-- Header actions ccontainer end -->

</div>
