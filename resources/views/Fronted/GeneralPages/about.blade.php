@extends('Fronted.layouts.master')

@section('title')
    {{trans('nedal.about_office')}}
@endsection

@section('content')


    <div class="image_section">
        <div class="section_background">
            <div class="img_background" >
                <img src="/images/about/{{about()->image}}" >
            </div>
        </div>
    </div>
    <div class="content_section container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6"><h1> {{trans('nedal.about_office')}}</h1></div>
            </div>
            @if(getLang() == 'ar')
            <p>{{about()->about_office}}</p>
                @else
                <p>{{about()->about_office_en}}</p>
        @endif
        </div>
    </div>

@endsection