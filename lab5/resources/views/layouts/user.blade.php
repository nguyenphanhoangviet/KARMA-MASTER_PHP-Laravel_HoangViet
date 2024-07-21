<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karma Shop</title>
    <link rel="stylesheet" href="{{ asset('css/user/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="{{ asset('css/user/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/scss/main.scss')
    @vite('resources/js/app.js')
</head>

<body id="category">
    @include('partials.header')

    @yield('banner')

    @yield('content')

    @include('partials.footer')
    <script>
        var prevImageUrl = "{{ asset('imgs/karma-master/product/prev.png') }}";
        var nextImageUrl = "{{ asset('imgs/karma-master/product/next.png') }}";
        var prevImageBanner = "{{ asset('imgs/karma-master/banner/prev.png') }}";
        var nextImageBanner = "{{ asset('imgs/karma-master/banner/next.png') }}";
    </script>   
    <script src="{{ asset('js/karma-master/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/karma-master/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/karma-master/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/countdown.js') }}"></script>
    <script src="{{ asset('js/karma-master/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('js/karma-master/gmaps.min.js') }}"></script>
    <script src="{{ asset('js/karma-master/main.js') }}"></script>
    <script src="{{ asset('js/karma-master/star.js') }}"></script>
    <script src="{{ asset('js/karma-master/shiping.js') }}"></script>
</body>

</html>
