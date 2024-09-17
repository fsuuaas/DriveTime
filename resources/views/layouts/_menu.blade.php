<div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{route('index')}}" class="navbar-brand p-0">
                {{--                <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>DriveTime</h1>--}}
                <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                    <a href="{{route('rentals')}}" class="nav-item nav-link">Rentals</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                <a href="{{route('login')}}" class="btn btn-info rounded-pill py-2 px-4">Login</a>
                <a href="{{route('register')}}" class="btn btn-success rounded-pill py-2 px-4 mx-2">Register</a>
            </div>
        </nav>
    </div>
</div>
