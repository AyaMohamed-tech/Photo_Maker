@extends('layouts.app')

@section('title')
  {{ __('messages.contactus') }}
@endsection

@section('styles')

    <style>
        input[type="file"] {
            padding: 0;
        }

        .black-box.margin-bottom {
            margin: 0 0 15px;
        }

        .checkbox-holder {
            font-weight: 100;
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
            display: block;
        }

        .checkbox-holder span {
            vertical-align: middle;
        }

        .checkbox-holder .checkbox-icon {
            width: 13px;
            height: 13px;
            line-height: 7px;
            display: inline-block;
            border: 1px solid #000;
            background: #000;
            text-align: center;
            margin: 0 4px;
        }

        .checkbox-holder input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkbox-holder .checkbox-icon:after {
            content: '';
            background: #000;
            width: 7px;
            height: 7px;
            display: block;
            margin: 2px;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon {
            border-color: #00bcd4;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon:after {
            background: #00bcd4;
        }

        .main-label {
            border-bottom: 1px dashed #00bcd4;
        }

        .check-open {
            margin-top: 10px;
        }
    </style>

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
        <h1 class="main-heading">{{ __('messages.contact') }}</h1>
        @if(Session::has('status'))
        <div class="alert alert-success">
              {{Session::get('status')}}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <form action="/store" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="company_name" placeholder="{{ __('messages.namecompany') }}">
                    <input type="text" name="activity_type" placeholder="{{ __('messages.Activitytype') }}">
                    <input type="tel"  name="contact_number" placeholder="{{ __('messages.contactnumber') }}">
                    <input type="email" name="email" placeholder="{{ __('messages.email') }}">

                    {{-- <label>{{ __('messages.servicetype') }}</label>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="1">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Photography') }}</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="2">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Foodanddrinks') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="3">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.furniture') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="4">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Hotels') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="5">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.realestates') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="6">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.ElectronicDevices') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="7">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Persons') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="8">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Documentingoccasions') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="9">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Other') }}</span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>{{ __('messages.numberofphotos') }}</label>
                                    <input type="number" placeholder="{{ __('messages.numberofphotos') }}">

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="10">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.hollowbackground') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="11">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.compositewallpaper') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="12">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.naturalphotography') }}</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox" name="service[]" value="13">
                                        <span class="checkbox-icon"></span>
                                        <span>{{ __('messages.Actors') }}</span>
                                    </label>

                                </div>
                            </div>
                        </div> --}}

{{-- 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>تصوير فوتوغرافي</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أطعمة ومشروبات</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أثاث</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>فنادق</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>عقار</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أجهزة إلكترونية</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أشخاص</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>توثيق مناسبات</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span> (يرجى التحديد )أخرى </span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>عدد الصور</label>
                                    <input type="number" placeholder="عدد الصور">

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>خلفية مفرغة</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>خلفية مركبة</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>تصوير بالشكل الطبيعي</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>الممثلين  ( تصوير الأشخاص)</span>
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="box black-box margin-bottom">
                                <div class="main-label">
                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>تصوير فوتوغرافي</span>
                                    </label>
                                </div>


                                <div class="check-open">

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أطعمة ومشروبات</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أثاث</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>فنادق</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>عقار</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أجهزة إلكترونية</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>أشخاص</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>توثيق مناسبات</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span> (يرجى التحديد )أخرى </span>
                                    </label>

                                    <input type="text" placeholder="">

                                    <label>عدد الصور</label>
                                    <input type="number" placeholder="عدد الصور">

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>خلفية مفرغة</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>خلفية مركبة</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>تصوير بالشكل الطبيعي</span>
                                    </label>

                                    <label class="checkbox-holder">
                                        <input type="checkbox">
                                        <span class="checkbox-icon"></span>
                                        <span>الممثلين  ( تصوير الأشخاص)</span>
                                    </label>

                                </div>
                            </div>
                        </div> --}}
                    {{-- </div> --}}


                    {{-- <label>{{ __('messages.Attachafile') }}</label>
                    <input type="file" placeholder="{{ __('messages.Attachafile') }}"> --}}

                    <div class="btn btn-white btn-block">
                        <span><input type="submit" value="{{ __('messages.send') }}"></span>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="box black-box text-center">
                    <h3 class="main-heading">{{ __('messages.contactdetails') }}</h3>

                    <p><i class="fa fa-envelope-o right-fa"></i> Info@pmstu.com</p>
                    <p><i class="fa fa-phone right-fa"></i> 0123456789</p>
                </div>

                <div class="box black-box text-center">

                    <h3 class="main-heading">{{ __('messages.Subscribe') }}</h3>

                    <form action="{{ url('/subscribe') }}" method="POST">
                        {{csrf_field()}}
                        <input type="email" name="email" placeholder="{{ __('messages.email') }}">
                        <div class="btn btn-white btn-block">
                            <span><input type="submit" value="{{ __('messages.Subscribe') }}"></span>
                        </div>
                    </form>

                {{-- {!!Form::open(['action' => 'ClientController@subscribe', 'method' => 'POST','role'=>'form'])!!}
                  {{csrf_field()}}

                  {{Form::email('email','',['placeholder' => 'بريدك الالكتروني'])}}
                  <div class="btn btn-white btn-block">
                    <span>
                        {{Form::submit('إشترك معنا')}}
                    </span>
                 </div>
                  {!!Form::close()!!} --}}

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

<script>
    $(document).ready(function (){
        $('.check-open').slideUp(0);

        $('.main-label .checkbox-holder').click(function (){
            if($(this).find('input').is(':checked')) {
                $(this).parents('.main-label').next('.check-open').stop().slideDown();
            } else {
                $(this).parents('.main-label').next('.check-open').stop().slideUp();
            }
        });
    });
</script>

@endsection