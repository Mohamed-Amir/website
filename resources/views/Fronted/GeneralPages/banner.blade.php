@php
$slider = App\Models\Sliders::all();
@endphp
<div id="slider">
    @foreach($slider as $row)
    <div class="slide" style="background:dodgerBlue;">
        <img src="/images/Sliders/{{$row->image}}" >
    </div>
    @endforeach
    <!--Controlling arrows-->
    <span class="controls1" onclick="prevSlide(-1)" id="left-arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
    <span class="controls1" id="right-arrow" onclick="nextSlide(1)"><i class="fa fa-arrow-right" aria-hidden="true"></i>
            </span>
</div>
