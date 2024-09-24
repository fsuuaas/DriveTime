<div class="header-lower">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-container flex justify-space align-center">
                    <!-- Logo Box -->
                    <div class="logo-box flex">
                        <div class="logo"><a href="{{route('index')}}"><img src="{{asset('frontend/assets/images/logo-default-416x96.svg')}}"
                                                                            alt="Logo"></a></div>
                    </div>
                    <div class="nav-outer flex align-center">
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="{{ request()->routeIs('index') ? 'current' : '' }}">
                                        <a href="{{route('index')}}">Home</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about') ? 'current' : '' }}">
                                        <a href="{{route('about')}}">About</a>
                                    </li>
                                    <li class="dropdown2">
                                        <a href="#">Cars</a>
                                        <ul>
                                            <li><a href="car-list.html">Car Listings</a></li>
                                            <li><a href="listing-details.html">Listings Details</a></li>
                                        </ul>

                                    </li>
                                    <li class="dropdown2">
                                        <a href="#">Page</a>
                                        <ul>
                                            <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="my-inventory.html">My Inventory</a></li>
                                            <li><a href="addcart.html">Add car</a></li>
                                            <li><a href="seller-profile.html">Seller Profile</a></li>
                                            <li><a href="dealer-details.html">Dealer Detail</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>

                                    </li>
                                    <li class="dropdown2"><a href="#">News </a>
                                        <ul>
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a href="{{route('contact')}}">Contact us </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    <div class="header-account flex align-center">
                        <div class="register ml--18">
                            <div class="flex align-center">
                                <a data-bs-toggle="modal" href="#exampleModalToggle" role="button">Register</a>
                                <a data-bs-toggle="modal" href="#exampleModalToggle2" role="button">Login</a>
                                {{--                                <a data-bs-toggle="modal" href="#exampleModalToggle" role="button">--}}
                                {{--                                    <img src="{{asset('frontend/assets/images/avatar/avt.png')}}" alt="">--}}
                                {{--                                </a>--}}
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
