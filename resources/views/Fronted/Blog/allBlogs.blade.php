@php
    $blogs=\App\Models\Blog::where('status',1)->first();
@endphp
@extends('Fronted.layouts.master')

@section('title')
    النصائح القانونيه
@endsection

@section('content')
    <div class="image_section">
        <div class="section_background serveces_back">
            <input id="tab-1" type="radio" name="tabs" checked>
            <label for="tab-1" class="">
                <div class="img_background tab" >
                    <img src="/images/Blog/{{$blogs->image}}" >
                </div>
            </label>

            <div class="content">
                <div id="content-1">
                    <div class="content_section container">
                        <div class="row">
                            <div class="col-md-4">
                                <h1 class="header_serv">{{$blogs->title}}</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$blogs->content}}</p>
                          <a href="{{route('blog.singleBlog',$blogs->id)}}"> <button class="moreService">المزيد</button> </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="serv">
        <div class="container">
            <div class="row">
                @foreach($blog as $row)
                <div class="col-md-4">
                    <img src="/images/Blog/{{$row->image}}">
                    <p>{{$row->title}}</p>
                    <div class="viewMoreBtn">
                   <a href="{{route('blog.singleBlog',$row->id)}}" ><button >عرض المزيد</button></a>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

    @include('Fronted.GeneralPages.homeAbout')

@endsection

