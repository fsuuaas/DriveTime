@extends('frontend.layouts.dashboard')
@section('page-style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5-custom.css')}}" />
    <style>

        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: .5em;
            display: inline-block;
            width: 200px;
            height: 38px;
        }
        #clickModal {
            margin-left: 2px;
            max-height: 40px;
            max-width: 40px;
            margin-top: -5px;
        }

        .car-img img {
            height: 80px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }
        .table-responsive {
            overflow-x: unset;
            -webkit-overflow-scrolling: unset;
        }

        table.dataTable {
            margin-top: 20px !important;
            margin-bottom: 6px !important;
            border: 1px solid #26ba4f;
        }

        tr{
            border: 1px solid #26ba4f;
        }

        th, td {
            vertical-align: middle;
            text-align: center;
            border: 1px solid #26ba4f;
        }

        .shade-green{
            background: #26ba4f;
        }

        .shade-blue{
            background: #3688fa;
        }

        .shade-yellow{
            background: #ffae1f;
        }

        .shade-red{
            background: #ff4949;
        }
    </style>
@stop

@section('main')

    <div class="has-dashboard">
        <main id="main-content" class="site-main-dashboard">
            <div class="page-dashboard-wrap" style="padding: 90px 40px 90px 40px;">
                <div class="dashboard">
                    <div class="row ">
                        <div class="col-12">
                            <h4 class="title-dashboard">My Rentals</h4>
                        </div>
                    </div>
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <!-- Card start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="RentalsDataTable" class="table table-bordered">
                                            <thead>
                                            <tr style="">
                                                <th style="width: 100px">Image</th>
                                                <th class="text-center">Rental UID</th>
                                                <th class="text-center">Car Name</th>
                                                <th class="text-center">Brand</th>
                                                <th class="text-center">Start</th>
                                                <th class="text-center">End</th>
                                                <th class="text-center">Total Cost</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Card end -->
                        </div>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
        </main>
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
                    <div class="modal-footer d-flex" id="footerBTN">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" style="width: 150px;">Close</button>
                        <button type="button" class="btn btn-success" id="saveChangesBtn" style="width: 150px;">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modals-->
    </div>

@endsection
@section('page-script')
    <!-- Data Tables -->
    <script src="{{asset('backend/vendor/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- Custom Data tables -->

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#RentalsDataTable').DataTable({
                "lengthMenu": [[20, 50, 100], [20, 50, 100]],
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: "{{ route('customer.rentals') }}",
                    type: 'GET',
                    data: function (d) {
                        d.status = $('#status').val(); // Send selected status to the server
                    }
                },
                columns: [
                    { data: 'image', name: 'image', orderable: false, searchable: false  },
                    { data: 'rental_uid', name: 'rentals.rental_uid' },
                    { data: 'car_name', name: 'cars.name' },
                    { data: 'brand', name: 'cars.brand' },
                    { data: 'start_date', name: 'rentals.start_date'},
                    { data: 'end_date', name: 'rentals.end_date'},
                    { data: 'total_cost', name: 'rentals.total_cost' },
                    { data: 'status', name: 'rentals.status'},
                    { data: "actions", name: 'actions', orderable: false, searchable: false }
                ],
                initComplete: function () {
                    $("#RentalsDataTable_filter").append('<select class="form-select" id="status" name="status" aria-label="Default select example" style="margin-left: 5px; max-width: 160px; display:inline"><option value="" selected>Select Status</option><option value="1">Booked</option><option value="2">Ongoing</option> <option value="3">Completed</option><option value="4">Cancelled</option></select>');

                    $('#status').on('change', function () {
                        $('#RentalsDataTable').DataTable().draw(true);
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '#clickModal', function(event) {
            event.preventDefault();

            let href = $(this).attr('data-attr');
            let title = $(this).attr('data-title');
            let btnTitle = $(this).attr('data-btn-title');
            let btnColor = $(this).attr('data-btn-color');

            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                    // Reset the modal content and button states
                    $('#modalTitle').html('');
                    $('#saveChangesBtn').html('Save changes');
                    $('#modalContent').empty();
                    // Handle button classes
                    $('#saveChangesBtn').removeClass('btn-success btn-primary btn-danger btn-warning btn-info');
                },
                // return the result
                success: function(result) {
                    $('#modalTitle').html(title);
                    $('#saveChangesBtn').html(btnTitle);
                    if (btnColor) {
                        $('#saveChangesBtn').addClass(btnColor);
                    }
                    $('#modalContent').html(result).show();
                    $('#modalView').modal("show");
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            });
        });
    </script>

@stop

