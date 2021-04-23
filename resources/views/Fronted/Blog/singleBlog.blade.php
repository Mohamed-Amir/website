@extends('Fronted.layouts.master')

@section('title')
    {{$blog->title}}
@endsection

@section('content')
    <div class="image_section">
        <div class="section_background">
            <div class="img_background" >
                <img src="/images/Blog/{{$blog->image}}" >
            </div>
        </div>
    </div>
    <div class="content_section container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6"><h1>{{$blog->title}}</h1></div>
            </div>
            <p>{{$blog->content}}</p>
        </div>
    </div>
@endsection
