<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/images/icon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/owl-carousel/owl.carousel.css')}}">

    @yield('links')

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
    @if (app()->islocale('ar'))
         <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-ar.css')}}">
    @else
          <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style-en.css')}}">
    @endif
   

    @yield('styles')

</head>

<body>

<!--===============================
    NAV
===================================-->

<!-- ======= start navbar ====== -->
  @include('include.navbar')
<!-- ======= end navbar ====== -->


<!--===============================
    CONTENT
===================================-->

<!-- ======= start content ====== -->
  @yield('content')
<!-- ======= end content ====== -->


<!--===============================
    FOOTER
===================================-->

<!-- ======= start footer ====== -->
  @include('include.footer')
<!-- ======= end footer ====== -->


<!--===============================
    SCRIPT
===================================-->

<script src="{{asset('frontend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>

<!-- ======= start scripts ====== -->
@yield('scripts')
<!-- ======= end scripts ====== -->

</body>
</html>