@extends('layouts.app')

@section('title')
  {{ __('messages.services') }}
@endsection

@section('content')

<!--===============================
    CONTENT
===================================-->

<div class="fixed-bg">
    <img src="../frontend/images/1.jpg">
</div>


<div class="main-content">
    <div class="container">
        <h1 class="main-heading">{{ __('messages.ourservices') }}</h1>


        <div class="border-bottom">
            <h1><strong>{{ __('messages.advertising') }}</strong></h1>
            <p>{{ __('messages.Photographing') }}</p>
            <p>{{ __('messages.AdvertisingTypes') }}</p>
            <ul class="list-numbered">
                <li>{{ __('messages.AdsType1') }}</li>
                <li>{{ __('messages.AdsType2') }}</li>
                <li>{{ __('messages.AdsType3') }}</li>
            </ul>
        </div>

        <div class="border-bottom">
            <h1><strong>{{ __('messages.digitalprocessing') }}</strong></h1>
            <p>{{ __('messages.stage') }}</p>
        </div>

        <div class="border-bottom">
            <h1><strong>{{ __('messages.videoshooting') }}</strong></h1>
            <p>{{ __('messages.highlight') }}</p>
            <ul class="list-numbered">
                <li>{{ __('messages.video1') }}</li>
                <li>{{ __('messages.video2') }}</li>
                <li>{{ __('messages.video3') }}</li>
            </ul>
        </div>

    </div>
</div>

@endsection