<nav class="sidebar-wrapper">

    <!-- Sidebar brand starts -->
    <div class="sidebar-brand">
        <a href="index.html" class="logo">
            <img src="{{asset('frontend/assets/images/logo-default-416x96.svg')}}" alt="Admin Dashboards" />
        </a>
    </div>
    <!-- Sidebar brand starts -->

    <!-- Sidebar menu starts -->
    <div class="sidebar-menu">
        <div class="sidebarMenuScroll">
            <ul>
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="#">
                        <i class="bi bi-house"></i>
                        <span class="menu-text">Dashboards</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.cars.index') ? 'active' : '' }}">
                    <a href="{{route('admin.cars.index')}}">
                        <i class="bi bi-car-front"></i>
                        <span class="menu-text">Car</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.rentals.index') ? 'active' : '' }}">
                    <a href="{{route('admin.rentals.index')}}">
                        <i class="bi bi-handbag"></i>
                        <span class="menu-text">Rentals</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="bi bi-person"></i>
                        <span class="menu-text">Customers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar menu ends -->

</nav>
