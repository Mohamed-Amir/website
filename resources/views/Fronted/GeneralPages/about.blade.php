@extends('Fronted.layouts.master')

@section('title')
عن المكتب
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
                <div class="col-md-6"><h1>عن المكتب</h1></div>
            </div>
            <p>{{about()->about_office}}</p>
        </div>
    </div>

@endsection