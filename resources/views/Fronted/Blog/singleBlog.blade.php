@extends('Fronted.layouts.master')

@section('title')
    @if(getLang() == 'ar')
    {{$blog->title}}
    @else
        {{$blog->title_en}}
    @endif
@endsection

@section('content')
    <div class="image_section">
        <div class="section_background">
            <div class="img_background" >
                <img style="width: 741px ;height: 465px" src="/images/Blog/{{$blog->image}}" >
            </div>
        </div>
    </div>
    <div class="content_section container">
        <div class="row">
            @if(getLang() == 'ar')
            <div class="col-md-12">
                <div class="col-md-6"><h1>{{$blog->title}}</h1></div>
            </div>
            @else
                <div class="col-md-12">
                    <div class="col-md-6"><h1>{{$blog->title_en}}</h1></div>
                </div>
                @endif
                @if(getLang() == 'ar')
                    <p>{{$blog->content}}</p>
                @else
                    <p>{{$blog->content_en}}</p>
                @endif
        </div>
    </div>
@endsection
