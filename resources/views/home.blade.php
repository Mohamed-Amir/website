@extends('Fronted.layouts.master')

@section('title')
    {{about()->site_name}}
@endsection

@section('content')
    @include('Fronted.GeneralPages.banner')
    @include('Fronted.GeneralPages.homeVids')

@endsection

@section('script')
    <script>

        const video = document.getElementById("video3");
        const play = document.getElementById("play");
        const stop = document.getElementById("stop");
        const progress = document.getElementById("progress");
        const timestamp = document.getElementById("timestamp");

        video.addEventListener("click", toggleVideoStatus);
        video.addEventListener("pause", updatePlayIcon);
        video.addEventListener("play", updatePlayIcon);
        video.addEventListener("timeupdate", updateProgress);
        play.addEventListener("click", toggleVideoStatus);
        stop.addEventListener("click", stopVideo);
        progress.addEventListener("change", setVideoProgress);

    </script>
    <script>
        function closeVideo(id) {
            var video = $('#video' + id);
            video.pause();
            video.style.display = 'none'
        }
    </script>
@endsection