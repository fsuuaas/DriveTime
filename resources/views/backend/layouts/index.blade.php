<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('backend.layouts._meta')

    <!--  Styles  -->
    @include('backend.layouts._styles')

</head>

<body>

<!-- Loading wrapper start -->
<div id="loading-wrapper">
    <div class="spinner">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        <div class="line4"></div>
        <div class="line5"></div>
        <div class="line6"></div>
    </div>
</div>
<!-- Loading wrapper end -->

<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Sidebar wrapper start -->
    @include('backend.layouts._side-menu')
    <!-- Sidebar wrapper end -->

    <!-- *************
              ************ Main container start *************
          ************* -->
    <div class="main-container">

        <!-- Page header starts -->
        @include('backend.layouts._topbar')
        <!-- Page header ends -->

        <!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

            <!-- Content wrapper start -->
           @yield('main')
            <!-- Content wrapper end -->

            <!-- App Footer start -->
            <div class="app-footer">
                <span>© Bootstrap Gallery 2024</span>
            </div>
            <!-- App footer end -->

        </div>
        <!-- Content wrapper scroll end -->

    </div>
    <!-- *************
              ************ Main container end *************
          ************* -->
    <!--begin::Modals-->
    <div class="modal fade" id="modalView" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    ...
                </div>
                <div class="modal-footer" id="footerBTN">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="saveChangesBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modals-->

</div>
<!-- Page wrapper end -->

<!--  Scripts  -->
@include('backend.layouts._scripts')

</body>

</html>
