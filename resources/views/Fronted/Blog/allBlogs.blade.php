@php
    $blogs=\App\Models\Blog::where('status',1)->first();
@endphp
@extends('Fronted.layouts.master')

@section('title')
<<<<<<< HEAD
    {{trans('nedal.legal_advice')}}
=======
    المدونة
>>>>>>> 1034e76b31867aad06a845b873c013665204d551
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
                            @if(getLang() == 'ar')
                            <div class="col-md-4">
                                <h1 class="header_serv">{{$blogs->title}}</h1>
                            </div>
                            @else
                                <div class="col-md-4">
                                    <h1 class="header_serv">{{$blogs->title_en}}</h1>
                                </div>
                            @endif
                            @if(getLang() == 'ar')
                            <div class="col-md-8">
                                <p>{{$blogs->content}}</p>
                          <a href="{{route('blog.singleBlog',$blogs->id)}}"> <button class="moreService">{{trans('nedal.more')}}</button> </a>
                            </div>
                                @else
                                    <div class="col-md-8">
                                        <p>{{$blogs->content_en}}</p>
                                        <a href="{{route('blog.singleBlog',$blogs->id)}}"> <button class="moreService">{{trans('nedal.more')}}</button> </a>
                                    </div>
                                @endif
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
                    @if(getLang() == 'ar')
                    <p>{{$row->title}}</p>
                    @else
                        <p>{{$row->title_en}}</p>
                    @endif
                    <div class="viewMoreBtn">
                   <a href="{{route('blog.singleBlog',$row->id)}}" ><button >{{trans('nedal.more')}}</button></a>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

    @include('Fronted.GeneralPages.homeAbout')

@endsection

