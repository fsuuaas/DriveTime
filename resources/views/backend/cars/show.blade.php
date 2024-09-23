<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="car-card bg-light d-flex align-items-center">
            <div class="car-image">
                <img src="{{asset($car->image)}}" alt="{{$car->name}}" class="car-img img-fluid">
            </div>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="car-info ml-4">
            <!-- Table start -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle m-0">
                    <thead>
                    <tr>
                        <th width="120px" class="text-center" colspan="2"><h3 class="car-name">{{$car->name}}</h3></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Brand</th>
                        <td>{{$car->brand}}</td>
                    </tr>
                    <tr>
                        <th>Model</th>
                        <td>{{$car->model}}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{$car->year}}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{$car->car_type}}</td>
                    </tr>
                    <tr>
                        <th>Daily Price</th>
                        <td> ৳ {{$car->daily_rent_price}}</td>
                    </tr>
                    <tr>
                        <th>Availability</th>
                        <td>
                            @if($car->availability == 1)
                                <span class="badge bg-primary">Available</span>
                            @else
                                <span class="badge bg-warning">Not Available</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- Table end -->
        </div>
    </div>
</div>
