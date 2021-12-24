@extends('layouts.app')

@section('title')
  photoMaker
@endsection

@section('content')
<!--===============================
    SLIDER
===================================-->

<div id="owl-demo" class="owl-carousel owl-theme">

   @foreach ( $sliders as $slider)

    <div class="item"><img src="/storage/slider_images/{{ $slider->slider_image }}" alt="..."></div>

    @endforeach

    {{-- <div class="item"><img src="frontend/images/1.jpg" alt="..."></div>
    <div class="item"><img src="frontend/images/2.jpg" alt="..."></div>
    <div class="item"><img src="frontend/images/3.jpg" alt="..."></div> --}}

</div>

<div class="hidden">
    <a class="btn owl-btn next"><span class="fa fa-angle-right"></span></a>
    <a class="btn owl-btn prev"><span class="fa fa-angle-left"></span></a>
</div>

@endsection





