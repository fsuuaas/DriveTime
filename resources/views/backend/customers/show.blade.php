<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="car-info ml-4">
            <!-- Table start -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle m-0">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$user->address}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- Table end -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="car-info ml-4">
            <!-- Table start -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle m-0">
                    <thead>
                    <tr>
                        <th>Rental UID</th>
                        <th>Car Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Model</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->rentals as $rental)
                        <tr>
                            <td>{{$rental->car->name}}</td>
                            <td>{{$rental->car->brand}}</td>
                            <td>{{$rental->car->model}}</td>
                            <td>{{$rental->total_cost}}</td>
                            <td>{!! $rental->status->getLabelHTML() !!}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- Table end -->
        </div>
    </div>
</div>
