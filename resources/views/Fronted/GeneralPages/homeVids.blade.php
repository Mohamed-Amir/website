@php
    $vids=\App\Models\Videos::where('status',1)->get();
@endphp
<div id="dots-con">
    <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
</div>
<div class="container">
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center p-4">
        <div class="">
            @if(Auth::check())
            <div class="row">
                @foreach($vids as $row)
                    <div class="col-md-6">
                        <div class="grid--container mb-8 max-h-8 max-w-4xl">
                            <div class="grid--image" style="background-image: url('55');"></div>
                            <div class="grid--content p-8 shadow-2xl">
                                <h1 class="card--title mb-4 text-4xl font-bold"> {{$row->name}}</h1>
                                <p class="card--content leading-tight mb-4">{{ substr($row->simple_desc,0,200)}}</p>
                                <button type="button" onclick="location.href='/singleVideo/{{$row->id}}'" class="bg-transparent py-2 px-4 button"
                                        >مشاهدة الفيديو
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                @endif
        </div>

    </div>
</div>