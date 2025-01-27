<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
    <meta name="base_url" content="{{url('/')}}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>EduCore - Online Courses & Education HTML Template</title>
    <link rel="icon" type="image/png" href="{{asset("user/assets/images/favicon.png")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/animated_barfiller.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/slick.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/venobox.min.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/scroll_button.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/pointer.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/jquery.calendar.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/range_slider.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/startRating.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/video_player.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/jquery.simple-bar-graph.min.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/sticky_menu.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/animate.css")}}">

    <link rel=" stylesheet" href="{{asset("user/assets/css/spacing.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("user/assets/css/responsive.css")}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

    @vite('resources/css/action-forms.css')
    @stack('header_script')
</head>

<body class="home_3">

<!--============ PRELOADER START ===========-->
<div id="preloader">
    <div class="preloader_icon">
        <img src="{{asset("user/assets/images/preloader.png")}}" alt="Preloader" class="img-fluid">
    </div>
</div>
<!--============ PRELOADER END ===========-->

@include('user.include.header')
@yield('content')
<!--================================
        SCROLL BUTTON START
    =================================-->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!--================================
        SCROLL BUTTON END
    =================================-->
<!--jquery library js-->
<script src="{{asset("user/assets/js/jquery-3.7.1.min.js")}}"></script>
<!--bootstrap js-->
<script src="{{asset("user/assets/js/bootstrap.bundle.min.js")}}"></script>
<!--font-awesome js-->
<script src="{{asset("user/assets/js/Font-Awesome.js")}}"></script>
<!--marquee js-->
<script src="{{asset("user/assets/js/jquery.marquee.min.js")}}"></script>
<!--slick js-->
<script src="{{asset("user/assets/js/slick.min.js")}}"></script>
<!--countup js-->
<script src="{{asset("user/assets/js/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("user/assets/js/jquery.countup.min.js")}}"></script>
<!--venobox js-->
<script src="{{asset('user/assets/js/venobox.min.js')}}"></script>
<!--nice-select js-->
<script src="{{asset('user/assets/js/jquery.nice-select.min.js')}}"></script>
<!--Scroll Button js-->
<script src="{{asset("user/assets/js/scroll_button.js")}}"></script>
<!--pointer js-->
<script src="{{asset("user/assets/js/pointer.js")}}"></script>
<!--range slider js-->
<script src="{{asset("user/assets/js/range_slider.js")}}"></script>
<!--barfiller js-->
<script src="{{asset("user/assets/js/animated_barfiller.js")}}"></script>
<!--calendar js-->
<script src="{{asset("user/assets/js/jquery.calendar.js")}}"></script>
<!--starRating js-->
<script src="{{asset("user/assets/js/starRating.js")}}"></script>
<!--Bar Graph js-->
<script src="{{asset("user/assets/js/jquery.simple-bar-graph.min.js")}}"></script>
<!--select2 js-->
<script src="{{asset("user/assets/js/select2.min.js")}}"></script>
<!--Video player js-->
<script src="{{asset("user/assets/js/video_player.min.js")}}"></script>
<script src="{{asset("user/assets/js/video_player_youtube.js")}}"></script>
<!--wow js-->
<script src="{{asset("user/assets/js/wow.min.js")}}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<!--main/custom js-->
<script src="{{asset("user/assets/js/main.js")}}"></script>


<!--dynamic js-->
@stack('scripts')
</body>

</html>
