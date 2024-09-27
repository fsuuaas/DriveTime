<div class="header-lower" style="border-bottom: 1px #8c0012 solid">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-container flex justify-space align-center">
                    <!-- Logo Box -->
                    <div class="logo-box flex">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('frontend/assets/images/logo-default-416x96.png')}}" style="height:50px;"
                                                                            alt="Logo222222222222222222222"></a>
                        </div>
                    </div>
                    <div class="nav-outer flex align-center">
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                @include('frontend.layouts.menu-shared')
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    <div class="header-account flex align-center">
                        <div class="register ml--18">
                            <div class="flex align-center">
                                @guest
                                <a data-bs-toggle="modal" href="#exampleModalToggle" role="button">Register</a>
                                <a data-bs-toggle="modal" href="#exampleModalToggle2" role="button">Login</a>
                                @else
                                <a href="{{ route('customer.dashboard')}}" style="font-size: 16px; font-weight: bolder">
                                    <img src="{{asset('frontend/assets/images/avatar/avt.png')}}" alt="" style="margin-right: 10px"> Dashboard
                                </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="mobile-nav-toggler mobile-button">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
