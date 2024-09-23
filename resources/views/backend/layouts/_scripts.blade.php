<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/modernizr.js')}}"></script>
<script src="{{asset('backend/js/moment.js')}}"></script>

<!-- *************
        ************ Vendor Js Files *************
    ************* -->

<!-- Overlay Scroll JS -->
<script src="{{asset('backend/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('backend/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>
<script>
    $(document).on('click', '#clickModal', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        let title = $(this).attr('data-title');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#modalTitle').html(title);
                $('#modalView').modal("show");
                $('#modalContent').html(result).show();

            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        });
    });
</script>

@yield('page-script')

<!-- Main Js Required -->
<script src="{{asset('backend/js/main.js')}}"></script>

