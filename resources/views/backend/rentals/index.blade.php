@extends('backend.layouts.index')
@section('title') Manage Rentals @endsection
@section('page-style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5-custom.css')}}" />
    <style>
        #clickModal {
            max-height: 40px;
            margin-top: -5px;
        }

        .car-img img {
            height: 90px;
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
        }

        th, td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
@stop
@section('title')
    Rentals
@endsection
@section('breadcrumb')
    Rentals
@endsection

@section('main')
    <div class="content-wrapper">
        <x-alert-backend />
        <!-- Row start -->
        <div class="row">
            <div class="col-sm-12 col-12">
                <!-- Card start -->
                <div class="card" style="padding: 2rem">
                    <div class="card-header">
                        <div class="card-title">Rentals</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="RentalsDataTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="text-center">Rental UID</th>
                                    <th class="text-center">Car Name</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Start</th>
                                    <th class="text-center">End</th>
                                    <th class="text-center">Total Cost</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-left">Action</th>
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
                order: [[2, 'desc']],
                ajax: {
                    url: "{{ route('admin.rentals.index') }}",
                    type: 'GET',
                    data: function (d) {
                        d.status = $('#status').val(); // Send selected status to the server
                    }
                },
                columns: [
                    { data: 'image', name: 'image' },
                    { data: 'rental_uid', name: 'rentals.rental_uid', searchable: true },
                    { data: 'car_name', name: 'cars.name', searchable: true },
                    { data: 'brand', name: 'cars.brand', searchable: true },
                    { data: 'name', name: 'users.name', searchable: true },
                    { data: 'phone', name: 'users.phone', searchable: true },
                    { data: 'start_date', name: 'rentals.start_date', searchable: true },
                    { data: 'end_date', name: 'rentals.end_date', searchable: true },
                    { data: 'total_cost', name: 'rentals.total_cost', searchable: true },
                    { data: 'status', name: 'rentals.status', searchable: true },
                    { data: "actions", name: 'actions', orderable: false, searchable: false }
                ],
                initComplete: function () {
                    $("#RentalsDataTable_filter").append('<select class="form-select" id="status" name="status" aria-label="Default select example" style="margin-left: 5px; margin-right: 5px; max-width: 130px; display:inline"><option value="" selected>Select Status</option><option value="1">Booked</option><option value="2">Ongoing</option> <option value="3">Completed</option><option value="4">Cancelled</option></select><a href="#" id="clickModal" data-title="Create Booking" data-attr="{{ route('admin.rentals.create') }}" data-btn-title="Create Booking" data-btn-color="btn-success" class="btn btn-primary"><i class="bi bi-plus-circle-dotted" style="font-size: 14px"></i> Create Booking</a>');

                    $('#status').on('change', function () {
                        $('#RentalsDataTable').DataTable().draw(true);
                    });
                }
            });
        });
    </script>

@stop
