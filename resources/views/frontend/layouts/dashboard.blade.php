<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Meta -->
   @include('frontend.layouts.meta')

    <!-- Theme Style -->
    @include('frontend.layouts.styles')
    <style>
        .nav-link {
            color: #fe4545;
        }

        .nav-link:hover {
            color: #57C257;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #57C257;
            background-color: unset;
        }

    </style>
</head>

<body class="body counter-scroll">

<!-- preload -->
<x-preloader/>
<!-- /preload -->

<!-- /#page -->
<div id="wrapper">
    <div id="page" class="clearfix">

        <!-- Main Header -->

        <header id="header" class="main-header header header-fixed ">
            <!-- Header Lower -->
            <x-menu/>
            <!-- End Header Lower -->
            <!-- Mobile Menu  -->
            <x-mobile-menu/>
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->

        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <x-dashboard-menu />
                </div>
                <div class="col py-3">
                    <x-alert-backend />
                    @yield('main')
                </div>
            </div>
        </div>

    </div>


    <!-- Footer -->
    <x-footer/>
    <!-- /#footer -->

</div>
<!-- /#page -->

<!-- Button Top -->
<a id="scroll-top" class="button-go"></a>
<!-- Button Top -->

<!-- Modal -->
@include('frontend.layouts.modals')
<!-- Modal -->


<!-- Javascript -->
@include('frontend.layouts.scripts')

</body>

</html>
