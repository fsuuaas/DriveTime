<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

    <div class="dropdown pb-4 pt-5">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('frontend/assets/images/avatar/avt.png')}}" alt="hugenerd" style="width: 50px; height: 50px;" class="rounded-circle">
            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{route('logout.custom')}}">Sign out</a></li>
        </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li>
            <a href="{{route('customer.dashboard')}}" class="nav-link px-0 align-middle {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>
        <li>
            <a href="{{route('customer.rentals')}}" class="nav-link px-0 align-middle {{ request()->routeIs('customer.rentals') ? 'active' : '' }}">
                <i class="fs-4 bi bi-car-front"></i><span class="ms-1 d-none d-sm-inline">Rentals</span></a>
        </li>
    </ul>

</div>
