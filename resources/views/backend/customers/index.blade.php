@extends('backend.layouts.index')
@section('title') Manage Customers @endsection
@section('page-style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs5-custom.css')}}" />
    <style>
        #clickModal {
            margin-left: 10px;
            max-height: 40px;
            margin-top: -5px;
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
    Cars
@endsection
@section('breadcrumb')
    Cars
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
                        <div class="card-title">Cars</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="CustomerDataTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
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

            var codeListTable = $('#CustomerDataTable').DataTable({
                "lengthMenu": [[20, 50, 100], [20, 50, 100]],
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: "{{ route('admin.users.index') }}",
                    type: 'GET',
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'address', name: 'address' },
                    { data: "actions", name: 'actions', orderable: false, searchable: false }
                ],
                initComplete: function () {
                    $("#CustomerDataTable_filter").append('<a href="#" id="clickModal" data-title="Add Customer" data-attr="{{ route('admin.users.create') }}" data-btn-title="Save Customer" data-btn-color="btn-success" class="btn btn-primary"><i class="bi bi-plus-circle-dotted" style="font-size: 14px"></i> Create</a>');
                }
            });
        });
    </script>

@stop
