@extends('layouts.appadmin')

@section('title')
  Edit slider
@endsection
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit slider</h4>
                  
                  {!!Form::open(['action' => 'AdminController@updateslider', 'class' => 'cmxform','method' => 'POST','id' => 'commentForm','enctype'=>'multipart/form-data'])!!}
                  {{csrf_field()}}
                  
                      <div class="form-group">
                      {{Form::hidden('id', $slider->id)}}
                      
                      {{Form::label('','Slider image',['for' => 'cname'])}}
                      {{Form::file('slider_image',['class' => 'form-control'])}} 
                      </div>
              
                      {{Form::submit('Update',['class' => 'btn btn-primary'])}}
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection