@extends('frontend.layouts.app')

@section('page-style')

@stop

@section('page-script')

@stop

@section('main')
    <!-- car-listing-list -->
    <div class="widget-banner-car-listing banner-car-listing-list">
        <div class="themesflat-container full">
            <div class="banner-car-listing">
                <span class="sub-title">Save up to 15%</span>
                <h1 class="title text-white">Autohix <span class="text-red">Rental</span> Car</h1>
            </div>
        </div>
    </div>

    <!-- car-listing-list -->


    <!-- Widget Tab Car Service -->
    <x-cars/>
    <!-- Widget Tab Car Service -->

@endsection
