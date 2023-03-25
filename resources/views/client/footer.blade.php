
    <!--====== Validate ======-->
    <script src="{{asset('client/contact-form/js/jquery.validate.min.js')}}"></script>

    <!--====== Jquery js ======-->
    <script src="{{asset('client/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('client/assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="{{asset('client/contact-form/js/jquery.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('client/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/contact-form/js/popper.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('client/assets/js/slick.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('client/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('client/assets/js/ajax-contact.js')}}"></script>

    <!--====== Isotope js ======-->
    <script src="{{asset('client/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('client/assets/js/isotope.pkgd.min.js')}}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('client/assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('client/assets/js/scrolling-nav.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('client/assets/js/main.js')}}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
