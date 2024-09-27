@extends('frontend.layouts.app')

@section('page-style')

@stop

@section('page-script')

@stop

@section('main')
<!-- Breakcrumb -->
<div class="widget-breakcrumb">
    <div class="themesflat-container">
        <div class="breakcrumb">
            <div class="title-breakcrumb">
                <a class="home" href="{{route('index')}}">Home</a>
                <span>Car Details</span>
            </div>
        </div>
    </div>
</div>
<!-- Breakcrumb -->
<div class="widget-property-detail" style="margin-top: 100px;">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrap-property-car flex">
                            <div class="box-1">
                                <div class="icon-box-info flex">
                                    <div class="info flex">
                                        <span>Brand:</span>
                                        <span class="fw-4">{{$car->brand}}</span>
                                    </div>
                                    <div class="info flex">
                                        <span>Model:</span>
                                        <span class="fw-4">{{$car->model}}</span>
                                    </div>
                                    <div class="info flex">
                                        <span>Type:</span>
                                        <span class="fw-4">{{$car->car_type}}</span>
                                    </div>
                                </div>
                                <div class="title-heading">{{$car->name}}</div>
                            </div>
                            <div class="box-2 t-al-right">
                                <div class="price-wrap flex">
                                    <p class="price-sale">${{$car->daily_rent_price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gallary-property-details">
                            <div class="swiper property-gallary2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div  class="swiper property-gallary">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset($car->image)}}" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="post-property">
                            <div class="wrap-description wrap-style">
                                <h4 class="title">Description</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but majority have
                                    suffered teration in some form, by injected humour, or randomised words which
                                    don't look even slight believable. If you are going to use a passa There
                                    are many variations of passages of Lorem Ipsum available, but majority have
                                    suffered teration in some form look even
                                    by injected humour, or randomised There are many variations of passages of Lorem
                                    Ipsum available, but majority
                                    have suffered teration in some form, by injected humour, or randomised words
                                    which don't look even slight believable.
                                    If you are going to use a passa There are many variations of passages of Lorem
                                    Ipsum available, but majority
                                    have suffered teration in some form, by injected humour, or randomised many
                                    variations of passages of Lorem Ipsum available, but majority There are many
                                    variations of passages of </p>
                            </div>
                            <div class="wrap-car-overview wrap-style">
                                <h4 class="title">Car Overview</h4>
                                <div class="listing-info">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Vector5"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Condition:</span>
                                                    <p class="listing-info-value">New</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group-1000002834"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Cylinders: </span>
                                                    <p class="listing-info-value">6</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class=" icon-Vector-13"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Stock Number:</span>
                                                    <p class="listing-info-value">N8990</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group5"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Fuel Type:</span>
                                                    <p class="listing-info-value">Petrol</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Vector-13"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">VIN Number:</span>
                                                    <p class="listing-info-value">84HKFI792KJDC</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group-15"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Doors:</span>
                                                    <p class="listing-info-value">4</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Vector-13"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Year:</span>
                                                    <p class="listing-info-value">2023</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Format-color-fill"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Color:</span>
                                                    <p class="listing-info-value">Black</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-dashboard-2"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Mileage: </span>
                                                    <p class="listing-info-value">28,000 miles</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group-22"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Seats:</span>
                                                    <p class="listing-info-value">5</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Vector-22"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Transmission :</span>
                                                    <p class="listing-info-value">Automatic</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group-31"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">City MPG:</span>
                                                    <p class="listing-info-value">18</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-engine-1"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Engine Size:</span>
                                                    <p class="listing-info-value">4.8L</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-Group-31"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Highway MPG:</span>
                                                    <p class="listing-info-value">28</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 item">
                                            <div class="inner listing-infor-box">
                                                <div class="icon">
                                                    <i class="icon-steering-wheel-1"></i>
                                                </div>
                                                <div class="content-listing-info">
                                                    <span class="listing-info-title">Driver type: </span>
                                                    <p class="listing-info-value">2WD</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-car-feature wrap-style">
                                <h4 class="title">Features</h4>
                                <div class="tf-listing-info">
                                    <div id="tf-features">
                                        <div class="features-item">
                                            <h5 class="features-type-title">Safety</h5>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>A/C:
                                                Front</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Central
                                                locking</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Leather
                                            </div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Sports
                                                package</div>
                                            <div class="listing-feature-wrap"><i
                                                    class="icon-Vector-32"></i>Navigation system</div>
                                        </div>
                                        <div class="features-item">
                                            <h5 class="features-type-title">Exterior</h5>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Front
                                                fog light</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Rain
                                                sensing wipe</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Rear
                                                Spoilers</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Sun roof
                                            </div>
                                            <div class="listing-feature-wrap"><i
                                                    class="icon-Vector-32"></i>Navigation system</div>
                                        </div>
                                        <div class="features-item">
                                            <h5 class="features-type-title">Interior</h5>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>A/C:
                                                Front</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Child
                                                safety locks</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Leather
                                            </div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Driver
                                                air bags</div>
                                            <div class="listing-feature-wrap"><i
                                                    class="icon-Vector-32"></i>Navigation system</div>
                                        </div>
                                        <div class="features-item">
                                            <h5 class="features-type-title">Convenience</h5>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Power
                                                steering</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Vanity
                                                mirror</div>
                                            <div class="listing-feature-wrap"><i class="icon-Vector-32"></i>Trunk
                                                Light</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-car-review wrap-style">
                                <h4 class="title">Customer Review</h4>
                                <div class="listing-customer-review">
                                    <div id="overall-rating-progress" class="progress">
                                        <svg class="progress-circle" width="187" height="186" viewBox="0 0 187 186"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M186 93C186 144.362 144.362 186 93 186C41.6375 186 0 144.362 0 93C0 41.6375 41.6375 0 93 0C144.362 0 186 41.6375 186 93ZM7.84935 93C7.84935 140.027 45.9726 178.151 93 178.151C140.027 178.151 178.151 140.027 178.151 93C178.151 45.9726 140.027 7.84935 93 7.84935C45.9726 7.84935 7.84935 45.9726 7.84935 93Z"
                                                fill="#F6F6F6" />
                                            <path
                                                d="M182.747 65.2706C189.087 85.458 188.32 107.192 180.572 126.887C172.824 146.582 158.559 163.063 140.128 173.61C121.698 184.157 100.204 188.141 79.1915 184.905C58.1789 181.668 38.903 171.404 24.5432 155.807C10.1834 140.209 1.59749 120.209 0.201677 99.105C-1.19414 78.0013 4.68351 57.0547 16.8651 39.7202C29.0468 22.3857 46.8047 9.69872 67.2099 3.75201C87.6151 -2.1947 109.449 -1.04598 129.109 7.0087L126.104 14.2665C108.103 6.89165 88.1118 5.83988 69.4288 11.2847C50.7459 16.7295 34.4867 28.3456 23.3332 44.2171C12.1798 60.0885 6.7982 79.2672 8.0762 98.5897C9.35421 117.912 17.2155 136.224 30.3633 150.506C43.5111 164.787 61.1601 174.184 80.3992 177.148C99.6382 180.111 119.318 176.463 136.193 166.806C153.068 157.149 166.129 142.06 173.223 124.027C180.317 105.994 181.019 86.0945 175.214 67.611L182.747 65.2706Z"
                                                fill="#D01818" />
                                        </svg>

                                        <div class="progress-text" data-progress="0">
                                            <p>Overall Ratings</p>
                                            <h3 class="overall-rating-number">4.4</h3>
                                            <p>Out Of 5</p>
                                        </div>
                                    </div>
                                    <div class="overall-rating-detail">
                                        <div class="overall-rating-detail-item">
                                            <label class="overall-rating-detail-label">Comfort</label>
                                            <div class="content">
                                                <div class="rating-info">
                                                    <span>Rating 4.8 </span>
                                                    <div class="overall-rating-detail-star">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                                <div class=" bg-primary overall-rating-detail-progress"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="overall-rating-detail-item">
                                            <label class="overall-rating-detail-label">Interior Design</label>
                                            <div class="content">
                                                <div class="rating-info">
                                                    <span>Rating 4.8 </span>
                                                    <div class="overall-rating-detail-star">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>

                                                <div class=" bg-primary overall-rating-detail-progress"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="overall-rating-detail-item">
                                            <label class="overall-rating-detail-label">Performance</label>
                                            <div class="content">
                                                <div class="rating-info">
                                                    <span>Rating 4.8 </span>
                                                    <div class="overall-rating-detail-star">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                                <div class=" bg-primary overall-rating-detail-progress"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="overall-rating-detail-item">
                                            <label class="overall-rating-detail-label">Speed</label>
                                            <div class="content">
                                                <div class="rating-info">
                                                    <span>Rating 4.8 </span>
                                                    <div class="overall-rating-detail-star">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                                <div class=" bg-primary overall-rating-detail-progress"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="reviews-list">
                                    <li class="review-item">
                                        <div class="review-media">
                                            <img src="{{asset('frontend')}}/assets/images/avatar/avt-review.jpg" alt="image">
                                        </div>
                                        <div class="review-body">
                                            <div class="media-heading d-flex">
                                                <a href="#">Rohan De Spond</a>
                                                <span class="review-date">25 jan 2021</span>
                                            </div>
                                            <div class="rating-box d-flex">
                                                <label class="rating-comfort_service">very awesome & Comfort</label>
                                                <div class="star-rating-review">
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <span>5.0</span>
                                                </div>
                                            </div>
                                            <p class="review-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.Curabitur have is
                                                covered many vulputate vestibulum Phasellus rhoncus, dolor eget
                                                viverra
                                                pretium dolor tellus aliquet nunc, vitae ultricies erat elit eu
                                                lacus. Vestibul
                                                non justo consectetur, cursus ante, tincidunt sapien. Nulla quis
                                            </p>
                                            <div class="image-review d-flex">
                                                <img src="{{asset('frontend')}}/assets/images/page/rivew-custom.jpg" alt="">
                                                <img src="{{asset('frontend')}}/assets/images/page/rivew-custom.jpg" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="review-item">
                                        <div class="review-media">
                                            <img src="{{asset('frontend')}}/assets/images/avatar/avt-review.jpg" alt="image">
                                        </div>
                                        <div class="review-body">
                                            <div class="media-heading d-flex">
                                                <a href="#">Rohan De Spond</a>
                                                <span class="review-date">25 jan 2021</span>
                                            </div>
                                            <div class="rating-box d-flex">
                                                <label class="rating-comfort_service">very awesome & Comfort</label>
                                                <div class="star-rating-review">
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <i class="icon-Vector3"></i>
                                                    <span>5.0</span>
                                                </div>
                                            </div>
                                            <p class="review-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.Curabitur have is
                                                covered many vulputate vestibulum Phasellus rhoncus, dolor eget
                                                viverra
                                                pretium dolor tellus aliquet nunc, vitae ultricies erat elit eu
                                                lacus. Vestibul
                                                non justo consectetur, cursus ante, tincidunt sapien. Nulla quis
                                            </p>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">

                @auth
                    <div class="author-contact-listing-wrap">
                        <div class="author-contact-wrap">
                            <h3 class="name text-center" style="text-align: center; display: inline-block"> Booking Form </h3>
                        </div>
                        <form action="{{route('customer.rental.booking', $car->id)}}" method="post" class="form-contact-admin" aria-label="Contact form">
                            @csrf
                            <input type="hidden" name="car_id" value="{{$car->id}}">
                            <div class="group-form">
                                <label for="name">Name</label>
                                <input class="admin-form" id="name" aria-invalid="false" placeholder="Enter Phone" value="{{Auth::user()->name}}" type="text" disabled>
                                <i class="icon-user-1-1" style="top: 60px;"></i>
                            </div>
                            <div class="group-form">
                                <label for="email">Email</label>
                                <input class="admin-form" id="email" aria-invalid="false" placeholder="Enter Phone" value=" {{Auth::user()->email}}" type="text" disabled>
                                <i class="icon-Group2" style="top: 60px;"></i>
                            </div>
                            <div class="group-form">
                                <label for="phone">Phone</label>
                                <input class="admin-form" id="phone" name="phone" aria-invalid="false" placeholder="Enter Phone" value="" type="text" required>
                                <i class="icon-Group-14" style="top: 60px;"></i>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="startDate">Start Date</label>
                                        <input id="startDate" name="startDate" type="date" class="form-control" style="padding: 15px 15px;"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="endDate">End Date</label>
                                        <input id="endDate" name="endDate" type="date" class="form-control" style="padding: 15px 15px;"/>
                                    </div>
                                </div>
                            </div>

                            <div class="group-form">
                                <label for="address" style="margin-top: 25px">Address</label>
                                <textarea class="admin-form" id="address" name="address" aria-invalid="false" rows="3" spellcheck="false" style="height: unset; padding: 10px"></textarea>

                            </div>
                            <div class="group-form">
                                <div class="form-check" style="padding-left: unset">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to make payment by cash.
                                    </label>
                                </div>
                            </div>
                            <button type="submit"> Book Now </button>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</div>

<!-- related-single-listing -->
<div class="widget-related-single-listing" style="padding-top: unset">
    <div class="themesflat-container">
        <div class="related-single-listing swiper">
            <div class="swiper-wrapper">
                @foreach($otherCars as $car)
                    <div class="listing-grid-item swiper-slide">
                        <div class="listing-item-image">
                            <div class="hover-listing-image">
                                <div class="wrap-hover-listing">
                                    <div class="listing-item active" title="{{$car->name}}">
                                        <div class="images">
                                            <img src="{{asset($car->image)}}"
                                                 class="swiper-image tfcl-light-gallery" alt="images">
                                        </div>
                                    </div>
                                    <div class="listing-item" title="{{$car->name}}">
                                        <div class="images">
                                            <img src="{{asset($car->image)}}"
                                                 class="swiper-image lazy tfcl-light-gallery" alt="images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing-item-content">
                            <div class="listing-top-content">
                                <h6 class="title"><a href="{{route('car.details', $car->id)}}">{{$car->name}}</a></h6>
                                <div class="review-wrap">
                                    <div class="rating">
                                        <i class="icon-Vector3"></i>
                                        <i class="icon-Vector3"></i>
                                        <i class="icon-Vector3"></i>
                                        <i class="icon-Vector3"></i>
                                        <i class="icon-Vector3"></i>
                                    </div>
                                    <span class="review">( 2 Reviews )</span>
                                </div>
                                <div class="description">
                                    <ul>
                                        <li class="listing-information fuel">
                                            <i class="icon-gasoline-pump-1"></i>
                                            <div class="inner">
                                                <span>Model</span>
                                                <p>{{$car->model}}</p>
                                            </div>
                                        </li>
                                        <li class="listing-information size-engine">
                                            <i class="icon-Group1"></i>
                                            <div class="inner">
                                                <span>Year</span>
                                                <p>{{$car->year}}</p>
                                            </div>
                                        </li>
                                        <li class="listing-information transmission">
                                            <i class="icon-gearbox-1"></i>
                                            <div class="inner">
                                                <span>Type</span>
                                                <p>{{$car->car_type}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-price-wrap">
                                <div class="price-wrap">
                                    <p class="price-sale">{{$car->daily_rent_price}}</p>
                                </div>
                                <div class="btn-read-more">
                                    <a class="more-link" href="{{route('car.details', $car->id)}}">
                                        <span>View details</span>
                                        <i class="icon-arrow-right2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!-- related-single-listing -->
@endsection
