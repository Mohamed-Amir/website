@php
$service = App\Models\Services::take(6)->get();
@endphp
<div class ="services">
    <div class="container" >
        <div class="row header_services">
            <div class="col-md-12">
                <img src="/Fronted/images/logoW.png">
                <h3>منطقه الممارسات</h3>
            </div>
        </div>
        @foreach($service as $row)
            <div class="col-md-4">
                <div class="service_item">
                    <img src="/images/Services/{{$row->logo}}">
                    <h4>{{$row->service_name}}</h4>
                </div>
             </div>
            @endforeach
        </div>
    </div>
