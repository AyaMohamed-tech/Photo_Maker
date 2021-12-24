@extends('layouts.app')

@section('title')
  {{ __('messages.aboutus') }}
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/image-popup/source/jquery.fancybox.css?v=2.1.5')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/image-popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}">
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
        <h1 class="main-heading">{{ __('messages.aboutus') }}</h1>

        <div class="text-center div-padding">
            <p>{{ __('messages.paragraphone') }}</p>
            <p>{{ __('messages.paragraphtwo') }}</p>
            <p>{{ __('messages.paragraphthree') }}</p>

            <a href="http://training.aljazeera.net/mritems/Documents/2016/2/16/e782075b14c84729a88e703e0776f66a_100.pdf" target="_blank" class="btn btn-white margin"><span>{{ __('messages.companyprofile') }}</span></a>
            <a href="gallery" class="btn btn-white margin"><span>{{ __('messages.viewourwork') }}</span></a>
        </div>


        <div class="div-small-padding">
            <h1 class="main-heading">{{ __('messages.ourclients') }}</h1>

            <div class="row">
                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn prev-pro margin"><span class="fa fa-angle-right"></span></a>
                </div>

                <div class="col-xs-8 col-sm-10 no-padding">
                    <div id="owl-demo-products" class="owl-carousel-clients">
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-1.jpg">
                                <img src="../frontend/images/logo-1.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-2.jpg">
                                <img src="../frontend/images/logo-2.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-3.jpg">
                                <img src="../frontend/images/logo-3.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-1.jpg">
                                <img src="../frontend/images/logo-1.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-2.jpg">
                                <img src="../frontend/images/logo-2.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-3.jpg">
                                <img src="../frontend/images/logo-3.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-1.jpg">
                                <img src="../frontend/images/logo-1.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-2.jpg">
                                <img src="../frontend/images/logo-2.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-3.jpg">
                                <img src="../frontend/images/logo-3.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-1.jpg">
                                <img src="../frontend/images/logo-1.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-2.jpg">
                                <img src="../frontend/images/logo-2.jpg" alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="frontend/images/logo-3.jpg">
                                <img src="../frontend/images/logo-3.jpg" alt="img">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn next-pro margin"><span class="fa fa-angle-left"></span></a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

<!--===============================
    SCRIPT
===================================-->

@section('scripts')

<script type="text/javascript" src="{{asset('frontend/image-popup/source/jquery.fancybox.js?v=2.1.5')}}"></script>
<script type="text/javascript" src="{{asset('frontend/image-popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>

<script>
    $(document).ready(function (){
        /*Button helper. Disable animations, hide close button, change title type and content*/

        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },

            afterLoad : function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });
    });
</script>

@endsection