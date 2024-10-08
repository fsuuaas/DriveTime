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
</head>

<body class="body counter-scroll">

<!-- preload -->
<x-preloader/>
<!-- /preload -->

<!-- /#page -->
<div id="wrapper">
    <div id="page" class="clearfix">

        <!-- Main Header -->

        <header id="header" class="main-header header header-fixed">
            <!-- Header Lower -->
            <x-menu/>
            <!-- End Header Lower -->
            <!-- Mobile Menu  -->
{{--            <x-mobile-menu/>--}}
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->

        @yield('main')

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
