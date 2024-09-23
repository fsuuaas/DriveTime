@extends('backend.index')
<style>
    .car-img {
        width: 100%;
        height: auto;
        max-width: 300px;
    }
    .car-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
    }
</style>
@section('main')
    <div class="row">
        <div class="col-xxl-12 col-sm-12 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Cars</h5>
                </div>
                <div class="card-body">

                    <!-- Table start -->
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle m-0">
                            <thead>
                            <tr>
                                <th width="120px" class="text-center">Image</th>
                                <th>Name</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Daily Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="CarList">

                            </tbody>
                        </table>
                    </div>
                    <!-- Table end -->

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="CarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-6" id="exampleModalLabel">Car</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="showCar">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        CarListRequest()
        async function CarListRequest() {
            let res= await axios.get("{{route('admin.cars.list')}}");
            let json=res.data

            console.log(json);

            $("#CarList").empty();


            if(json.length!==0){
                json.forEach((car,i)=>{
                    let BASE_URL = 'http://drivetime.test/'
                    let imageUrl = `${BASE_URL}${car['image']}`;
                    let availabilityBadge = '';
                    if (car['availability'] === 1) {
                        availabilityBadge = '<span class="badge border border-success bg-success-subtle text-success">Available</span>';
                    } else {
                        availabilityBadge = '<span class="badge border border-warning bg-warning-subtle text-warning">Not Available</span>';
                    }
                    let rows=`<tr>
                       <td class="text-center"><img src="${imageUrl}" alt="${car['name']}" style="width:100px;height:auto;"></td>
                       <td>${car['name']} </td>
                       <td class="text-center">${car['brand']}</td>
                       <td class="text-center">${car['model']}</td>
                       <td class="text-center">${car['year']}</td>
                        <td class="text-center">${car['car_type']}</td>
                       <td class="text-center">৳ ${parseFloat(car['daily_rent_price']).toFixed(2)}</td>
                       <td class="text-center">
                        ${availabilityBadge}
                       </td>
                       <td class="text-center">
                            <button data-id=${car['id']} class="btn Details btn-info btn-sm">Details</button>
                            <button data-id=${car['id']} class="btn Edit btn-warning btn-sm">Edit</button>
                            <button data-id=${car['id']} class="btn Delete btn-danger btn-sm">Delete</button>
                        </td>
                   </tr>`

                    $("#CarList").append(rows);
                })


                $(".Details").on('click',function () {
                    let id=$(this).data('id');
                    ViewCar(id)
                })

            }
        }

        async function ViewCar(id) {
            let url = `{{ route('admin.car.view', ':id') }}`.replace(':id', id);

            // Show preloader before making the request
            $(".preloader").delay(90).fadeIn(100).removeClass('loaded');

            try {
                // Make the request to get car details
                let res = await axios.get(url);
                let car = res.data;  // Assuming `res.data` contains the car details
                let BASE_URL = 'http://drivetime.test/'
                let imageUrl = `${BASE_URL}${car.image}`;
                // Dynamically generate the HTML content for the car details
                let rows = `
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="car-card bg-light d-flex align-items-center">
                    <div class="car-image">
                        <img src="${imageUrl}" alt="${car.name}" class="car-img img-fluid">
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
                                <th width="120px" class="text-center" colspan="2"><h3 class="car-name">${car.name}</h3></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Brand</td>
                                    <td>${car.brand}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>${car.model}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>${car.year}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>${car.car_type}</td>
                                </tr>
                                <tr>
                                    <td>Daily Price</td>
                                    <td> ৳ ${parseFloat(car.daily_rent_price).toFixed(2)}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                    <span class="badge border border-${car.availability == 1 ? 'success' : 'warning'} bg-${car.availability == 1 ? 'success' : 'warning'}-subtle text-${car.availability == 1 ? 'success' : 'warning'}">
                                        ${car.availability == 1 ? 'Available' : 'Not Available'}
                                    </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table end -->
                    </div>
            </div>
        </div>`;

                // Display the content inside the modal
                $("#CarModal .modal-body").html(rows);

                // Show the modal after the content is ready
                $("#CarModal").modal('show');

            } catch (error) {
                console.error('Error fetching car details:', error);
                // You can add error handling here (e.g., display an error message in the modal)
            } finally {
                // Hide preloader after the request completes
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            }
        }
    </script>
@stop
