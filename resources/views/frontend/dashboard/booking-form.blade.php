@extends('frontend.layouts.dashboard')

@section('page-style')
    <style>
        .form-texts{
            height: 58px;
            width: 397px;
            background-color: white;
            color: #595960;
            font-size: 16px;
            line-height: 56px;
            font-weight: 600;
            padding: 1px 5px 5px 55px;
            border: 1px solid #EBEBEB;
            border-radius: 5px;
        }
    </style>
@stop

@section('page-script')

@stop

@section('main')
 <div class="row">
     <div class="col-md-6">
         <div class="tf-car-service">
             <a href="{{route('car.details', $car->id)}}" class="image">
                 <div class="listing-images">
                     <div class="hover-listing-image">
                         <div class="wrap-hover-listing">
                             <div class="listing-item active">
                                 <div class="images">
                                     <img src="{{asset($car->image)}}" class="swiper-image tfcl-light-gallery" alt="images">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </a>
             <div class="content">
                 <div class="d-flex" style="justify-content: space-between;">
                     <div class="flex-column text-start">
                         <span class="sub-title">{{$car->brand}}</span>
                         <h6 class="title"><a href="{{route('car.details', $car->id)}}">{{$car->name}}</a></h6>
                     </div>
                     <div class="flex-column text-end">
                         @if($car->availability)
                             <span class="badge" style="background-color:#1BB3DA">
                                 Available
                             </span>
                         @else
                             <span class="badge" style="background-color: #EC0E2F">
                                  Not Available
                             </span>
                         @endif
                     </div>
                 </div>
                 <div class="description">
                     <ul>
                         <li class="listing-information fuel">
                             <i class="icon-gasoline-pump-1"></i>
                             <div class="inner"><span>Model</span><p>{{$car->model}}</p></div>
                         </li>
                         <li class="listing-information size-engine">
                             <i class="icon-1"></i>
                             <div class="inner"><span>Year</span><p>{{$car->year}}</p></div>
                         </li>
                         <li class="listing-information transmission">
                             <i class="icon-gearbox-1"></i>
                             <div class="inner"><span>Type</span><p>{{$car->car_type}}</p></div>
                         </li>
                     </ul>
                 </div>
                 <div class="bottom-btn-wrap">
                     <div class="btn-read-more" style="font-weight: bold">
                        Daily Rental Price
                     </div>
                     <div class="btn-group">
                         <span class="price" style="font-size: 18px">${{$car->daily_rent_price}}</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-md-6">
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
     </div>
 </div>
@endsection

