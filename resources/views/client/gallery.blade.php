@extends('layouts.app')

@section('title')
  {{ __('messages.gallery') }}
@endsection

@section('content')

<!--===============================
    CONTENT
===================================-->

<div class="fixed-bg">
    <img src="../frontend/images/1.jpg">
</div>


<div class="main-content">
    <div class="container-fluid">
        <h1 class="main-heading">{{ __('messages.ourwork') }}</h1>

        <div class="row">

            @foreach ($categories as $category)           
            
            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="/view_by_cat/{{ $category->category_name }}" class="img-holder">
                    <img src="/storage/category_images/{{ $category->category_image }}" alt="...">

                    <div class="hover-content">
                        <h1>{{ $category->category_name }}</h1>
                    </div>
                </a>
            </div>
            @endforeach

            {{-- <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/2.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/3.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div> --}}

           {{-- <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/1.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/2.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/3.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/1.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/2.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                <a href="category" class="img-holder">
                    <img src="frontend/images/3.jpg" alt="...">

                    <div class="hover-content">
                        <h1>اسم القسم</h1>
                    </div>
                </a>
            </div>
        </div> --}}

    </div>
</div>

@endsection