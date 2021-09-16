<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('front-end/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front-end/plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/about_responsive.css')}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('head')
</head>

<body>

    <div class="super_container">

        @include('front-end.layout.includes.header')

        @yield('content')

        @include('front-end.layout.includes.footer')
    </div>

    <script src="{{asset('front-end/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front-end/styles/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('front-end/styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('front-end/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('front-end/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('front-end/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
    <script src="{{asset('front-end/js/about.js')}}"></script>








    @yield('foot')

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('sukses'))
        toastr.success("{{Session::get('sukses')}}", "Sukses")
        @endif
    </script>

</body>

</html>