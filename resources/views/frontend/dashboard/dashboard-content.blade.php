@extends('frontend.layouts.dashboard')

@section('page-style')
@stop

@section('page-script')

@stop

@section('main')
    <div class="has-dashboard">
        <main id="main-content" class="site-main-dashboard">
            <div class="page-dashboard-wrap">
                <div class="dashboard">
                    <div class="row ">
                        <div class="col-12">
                            <h4 class="title-dashboard">Dashboard</h4>
                        </div>
                    </div>
                    <div class="show-dashboard">
                                <span class="btn-show-dashboard">
                                    <i class="icon-th-list"></i>
                                    Show Dashboard
                                </span>
                    </div>
                    <div class="dashboard-overview">
                        <div class="row tf-counter">
                            <div class="col-12 col-sm-6 col-xl-6 col-xxl-3">
                                <div class="db-card tf-counter">
                                    <div class="icon-overview">
                                        <i class="bi bi-car-front text-danger" style="font-size: 34px"></i>

                                    </div>
                                    <div class="content-overview">
                                        <span>My Rentals</span>
                                        <div class="d-flex">
                                            <div class="listing-text number" data-to="{{$total_rental}}" data-speed="3000"
                                                 data-waypoint-active="yes">{{$total_rental}}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-6 col-xxl-3">
                                <div class="db-card tf-counter">
                                    <div class="icon-overview">
                                        <i class="bi bi-calendar-date text-danger" style="font-size: 34px"></i>
                                    </div>
                                    <div class="content-overview">
                                        <span>Booked</span>
                                        <div class="listing-text number" data-to="{{$booked_rental}}" data-speed="3000"
                                             data-waypoint-active="yes">{{$booked_rental}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-6 col-xxl-3">
                                <div class="db-card tf-counter">
                                    <div class="icon-overview">
                                        <i class="bi bi-clipboard2-check text-danger" style="font-size: 34px"></i>
                                    </div>
                                    <div class="content-overview">
                                        <span>Completed</span>
                                        <div class="d-flex">
                                            <div class="listing-text number" data-to="{{$completed_rental}}" data-speed="3000"
                                                 data-waypoint-active="yes">{{$completed_rental}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-6 col-xxl-3">
                                <div class="db-card tf-counter">
                                    <div class="icon-overview">
                                        <i class="bi bi-currency-dollar text-danger" style="font-size: 34px"></i>
                                    </div>
                                    <div class="content-overview">
                                        <span>Total Spend</span>
                                        <div class="d-flex">
                                            <span> $ </span><div class="listing-text number" data-to="{{$total_spend}}" data-speed="3000"
                                                 data-waypoint-active="yes">{{$total_spend}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-middle">
                        <div class="row">
                            <div class="dashboard-middle-left col-xxl-6 col-xl-12">
                                <div class="page-insight">
                                    <!-- chart -->
                                    <div class="wg-box">
                                        <div class="flex justify-space">
                                            <h5>Total page view</h5>
                                            <div class="group-select">
                                                <div class="nice-select" tabindex="0">
                                                    <span class="current">This Week</span>
                                                    <ul class="list">
                                                        <li data-value class="option selected">This Week</li>
                                                        <li data-value="Last day" class="option">Last Day</li>
                                                        <li data-value="Last Week" class="option">Last Week</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="line-chart-1"></div>
                                    </div>
                                    <!-- /chart -->
                                </div>
                            </div>
                            <div class="dashboard-middle-right col-xxl-3 col-xl-12">
                                <div class="tfcl-card dashboard-message">
                                    <h5 class="title-dashboard">What,s New?</h5>
                                    <ul class="message">
                                        <li>
                                            <div class="icon">
                                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.75026 12.2275L2.20026 7.67748L0.683594 9.19414L6.75026 15.2608L19.7503 2.26081L18.2336 0.744141L6.75026 12.2275Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>Congratulation Your <span class="text-red">23</span> Listing has
                                                been approved Today</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.293 0.875H2.70964C1.65547 0.875 0.802552 1.7375 0.802552 2.79167L0.792969 18.125L7.5013 15.25L14.2096 18.125V2.79167C14.2096 1.7375 13.3471 0.875 12.293 0.875ZM12.293 15.25L7.5013 13.1608L2.70964 15.25V2.79167H12.293V15.25Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>Someone is saved your listing</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4154 6.10982V13.2507C16.4154 14.1215 15.7029 14.834 14.832 14.834H2.16536C1.29453 14.834 0.582031 14.1215 0.582031 13.2507V3.75065C0.582031 2.87982 1.29453 2.16732 2.16536 2.16732H10.1612C10.1137 2.42065 10.082 2.68982 10.082 2.95898C10.082 4.13065 10.5966 5.16773 11.4041 5.89607L8.4987 7.70898L2.16536 3.75065V5.33398L8.4987 9.29232L12.6945 6.66398C13.122 6.82232 13.5654 6.91732 14.0404 6.91732C14.9349 6.91732 15.7504 6.60857 16.4154 6.10982ZM11.6654 2.95898C11.6654 4.27315 12.7262 5.33398 14.0404 5.33398C15.3545 5.33398 16.4154 4.27315 16.4154 2.95898C16.4154 1.64482 15.3545 0.583984 14.0404 0.583984C12.7262 0.583984 11.6654 1.64482 11.6654 2.95898Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>You have unread <span class="text-red">21</span> Message</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.293 0.875H2.70964C1.65547 0.875 0.802552 1.7375 0.802552 2.79167L0.792969 18.125L7.5013 15.25L14.2096 18.125V2.79167C14.2096 1.7375 13.3471 0.875 12.293 0.875ZM12.293 15.25L7.5013 13.1608L2.70964 15.25V2.79167H12.293V15.25Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>Congratulation Your <span class="text-red">22</span> Listing has
                                                been</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.293 0.875H2.70964C1.65547 0.875 0.802552 1.7375 0.802552 2.79167L0.792969 18.125L7.5013 15.25L14.2096 18.125V2.79167C14.2096 1.7375 13.3471 0.875 12.293 0.875ZM12.293 15.25L7.5013 13.1608L2.70964 15.25V2.79167H12.293V15.25Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>Mehedii Added Favorites Your listing “Mercedez Benz 2.3”</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4154 6.10982V13.2507C16.4154 14.1215 15.7029 14.834 14.832 14.834H2.16536C1.29453 14.834 0.582031 14.1215 0.582031 13.2507V3.75065C0.582031 2.87982 1.29453 2.16732 2.16536 2.16732H10.1612C10.1137 2.42065 10.082 2.68982 10.082 2.95898C10.082 4.13065 10.5966 5.16773 11.4041 5.89607L8.4987 7.70898L2.16536 3.75065V5.33398L8.4987 9.29232L12.6945 6.66398C13.122 6.82232 13.5654 6.91732 14.0404 6.91732C14.9349 6.91732 15.7504 6.60857 16.4154 6.10982ZM11.6654 2.95898C11.6654 4.27315 12.7262 5.33398 14.0404 5.33398C15.3545 5.33398 16.4154 4.27315 16.4154 2.95898C16.4154 1.64482 15.3545 0.583984 14.0404 0.583984C12.7262 0.583984 11.6654 1.64482 11.6654 2.95898Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>You have unread <span class="text-red">21</span> Message</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.293 0.875H2.70964C1.65547 0.875 0.802552 1.7375 0.802552 2.79167L0.792969 18.125L7.5013 15.25L14.2096 18.125V2.79167C14.2096 1.7375 13.3471 0.875 12.293 0.875ZM12.293 15.25L7.5013 13.1608L2.70964 15.25V2.79167H12.293V15.25Z"
                                                        fill="#D01818" />
                                                </svg>
                                            </div>
                                            <p>Congratulation Your <span class="text-red">22</span> Listing has
                                                been</p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="dashboard-middle-right col-xxl-3 col-xl-12">
                                <div class="tfcl-card dashboard-reviews">
                                    <h5 class="title-dashboard">Recent Reviews</h5>
                                    <ul>
                                        <li class="comment-by-user">
                                            <div class="group-author">
                                                <img src="{{asset('frontend/assets/images/avatar/avt-blog.jpg')}}" alt="">
                                                <div class="group-name">
                                                    <div class="review-name">Rohan De Spond</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                        <li class="comment-by-user">
                                            <div class="group-author">
                                                <img src="{{asset('frontend/assets/images/avatar/avt-blog.jpg')}}" alt="">
                                                <div class="group-name">
                                                    <div class="review-name">Rohan De Spond</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                        <li class="comment-by-user">
                                            <div class="group-author">
                                                <img src="{{asset('frontend/assets/images/avatar/avt-blog.jpg')}}" alt="">
                                                <div class="group-name">
                                                    <div class="review-name">Rohan De Spond</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                        <i class="icon-Vector3"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
