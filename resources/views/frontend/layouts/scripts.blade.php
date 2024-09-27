<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-countTo.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/price-ranger.js') }}"></script>
<script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/apexcharts.js') }}"></script>
<script src="{{ asset('frontend/assets/js/line-chart.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/map.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/map.js')}}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="{{asset('frontend/assets/js/axios.min.js')}}"></script>
<script>
    $(document).on('click', '.booking-link', function(e) {
        e.preventDefault();
        let bookingUrl = $(this).attr('href');

        axios.get(bookingUrl)
            .then(response => {
                // If authenticated, redirect to the booking page
                window.location.href = bookingUrl;
            })
            .catch(error => {
                if (error.response && error.response.status === 401) {
                    // If unauthenticated, show the login modal
                    $('#exampleModalToggle2').modal('show');
                }
            });
    });

</script>
@yield('page-script')
@stack('script')
