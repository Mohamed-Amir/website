@extends('Fronted.layouts.master')

@section('title')
    {{$video->name}}
    @endsection

@section('content')

    <div class="videoDiv">
        <video src="{{getImageUrl('Videos',$video->video)}}" " id="video" class="screen" poster="{{getImageUrl('Videos_cover',$video->cover)}}">
        </video>
        <div class="controls">
            <button class="btn" id="play">
                <i class="fa fa-play-circle fa-2x"></i>
            </button>
            <button class="btn" id="stop">
                <i class="fa fa-stop fa-2x"></i>
            </button>
            <input
                    type="range"
                    id="progress"
                    class="progress"
                    min="0"
                    max="100"
                    step="0.1"
                    value="0"
            />
            <span class="timestamp" id="timestamp">00:00</span>
        </div>
    </div>

@endsection

@section('script')
    <script src="/Fronted/js/video.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    @endsection