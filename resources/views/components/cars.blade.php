<div class="widget-car-service">
    <div class="themesflat-container">
        <div class="header-section tab-car-service">
            <div class="heading-section">
                <span class="sub-title mb-6 wow fadeInUp">Trusted Car DeAler Service</span>
                <h2 class="title wow fadeInUp">Explore all Vehicles</h2>
            </div>
            <div class="car-filter d-flex">
                <div class="form-group ml-2">
                    <div class="group-select">
                        <select class="form-control form-select nice-select" name="brand" id="brand" style="padding: 15px 40px 15px 25px;">
                            <option value="" selected disabled>Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <div class="group-select">
                        <select class="form-control form-select nice-select" name="model" id="model" style="padding: 15px 40px 15px 25px;">
                            <option value="" selected disabled>Model</option>
                            @foreach($models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <div class="group-select">
                        <select class="form-control form-select nice-select" name="type" id="type" style="padding: 15px 40px 15px 25px;">
                            <option value="" selected disabled>Type</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <div class="group-select">
                        <select class="form-control form-select nice-select" name="year" id="year" style="padding: 15px 40px 15px 25px;">
                            <option value="" selected disabled>Year</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <input type="text" id="Price" class="form-control" name="daily_rent_price" placeholder="Price" style="width: 103px; height: 56px">
                </div>
                <a href="#" class="icon-service reset-btn ml-2" id="reset">
                    <i class="icon-shuffle-2-11"></i>
                </a>
            </div>
        </div>
        <!-- Widget Car Service -->
        <div class="car-list-item">

        </div>
        <!-- Widget Car Service -->
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            const carListContainer = $('.car-list-item');
            const filters = { brand: '', model: '', type: '', year: '', price: '' };

            // Event listener for the select elements
            $('.form-select').on('change', function () {
                const filterType = $(this).attr('name');
                filters[filterType] = $(this).val();
                fetchCars();
            });

            // Event listener for the price input
            $('#Price').on('input', function () {
                filters.price = $(this).val();
                fetchCars();
            });

            // Reset button logic
            $('#reset').on('click', function (e) {
                e.preventDefault();
                $('.form-select').val(''); // Reset all select dropdowns
                $('#Price').val(''); // Clear the price input
                $.each(filters, (key) => filters[key] = ''); // Reset filters object
                fetchCars();
            });

            async function fetchCars() {
                try {
                    const query = $.param(filters);
                    const response = await axios.get(`{{route('cars.all')}}?${query}`);
                    const cars = response.data;

                    carListContainer.empty(); // Clear existing cars
                    if (cars.length > 0) {
                        cars.forEach(car => {
                            const carItem = `
                        <div class="tf-car-service">
                            <a href="/car/details/${car.id}" class="image">
                                <div class="listing-images">
                                    <div class="hover-listing-image">
                                        <div class="wrap-hover-listing">
                                            <div class="listing-item active">
                                                <div class="images">
                                                    <img src="${car.image}" class="swiper-image tfcl-light-gallery" alt="images">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="content">
                                <div class="d-flex" style="justify-content: space-between;">
                                    <div class="flex-column text-start">
                                        <span class="sub-title">${car.brand}</span>
                                        <h6 class="title"><a href="/car/details/${car.id}">${car.name}</a></h6>
                                        <span class="price">$${car.daily_rent_price}</span>
                                    </div>
                                    <div class="flex-column text-end">
                                        <span class="badge" style="background-color: ${car.availability ? '#1BB3DA' : '#EC0E2F'}">
                                            ${car.availability ? 'Available' : 'Not Available'}
                                        </span>
                                    </div>
                                </div>
                                <div class="description">
                                    <ul>
                                        <li class="listing-information fuel">
                                            <i class="icon-gasoline-pump-1"></i>
                                            <div class="inner"><span>Model</span><p>${car.model}</p></div>
                                        </li>
                                        <li class="listing-information size-engine">
                                            <i class="icon-1"></i>
                                            <div class="inner"><span>Year</span><p>${car.year}</p></div>
                                        </li>
                                        <li class="listing-information transmission">
                                            <i class="icon-gearbox-1"></i>
                                            <div class="inner"><span>Type</span><p>${car.car_type}</p></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-btn-wrap">
                                    <div class="btn-read-more">
                                        <a class="more-link" href="/car/details/${car.id}">
                                            <span>View details</span><i class="icon-arrow-right2"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="/customer/car/${car.id}/booking" class="icon-service booking-link">
                                            <i class="icon-Group-3"></i> Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                            carListContainer.append(carItem);
                        });
                    } else {
                        carListContainer.html('<p>No cars found</p>');
                    }
                } catch (error) {
                    console.error('Error fetching cars:', error);
                }
            }

            // Initial fetch to load all cars
            fetchCars();
        });
    </script>
@endpush
