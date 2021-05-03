@php
    $vids=\App\Models\Videos::where('status',1)->get();
@endphp
<div id="dots-con">
    <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
</div>
<div class="container">
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center p-4">
        <div class="">
            @foreach($vids as $row)
            <div class="col-md-6">
                <div class="grid--container mb-8 max-h-8 max-w-4xl">
                    <div class="grid--image"></div>
                    <div class="grid--content p-8 shadow-2xl">
                        <h1 class="card--title mb-4 text-4xl font-bold"> {{$row->name}}</h1>
                        <p class="card--content leading-tight mb-4">{{$row->simple_desc}}</p>
                        <button type="button" class="bg-transparent py-2 px-4 button" data-bs-toggle="modal" data-bs-target="#exampleModal">MORE INFORMATION</button>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Video title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <video src="https://designsupply-web.com/samplecontent/vender/codepen/20181014.mp4" id="video" class="screen" poster="https://images.unsplash.com/photo-1472148439583-1f4cf81b80e0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80"></video>
                        <!-- Sample Video provided by DesignSupply https://codepen.io/designsupply/pen/zmEWBm -->
                        <div class="controls">
                            <button class="btn" id="play">
                                <i class="fa fa-play-circle fa-2x"></i>
                            </button>
                            <button class="btn" id="stop">
                                <i class="fa fa-stop fa-2x"></i>
                            </button>
                            <input type="range" id="progress" class="progress" min="0" max="100" step="0.1"value="0"/>
                            <span class="timestamp" id="timestamp">00:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>