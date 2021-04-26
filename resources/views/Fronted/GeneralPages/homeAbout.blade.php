<div class="container about">
    <div class="row">
        <div class="col-md-4">
            <img src="/images/about/{{about()->image}}">
        </div>
        <div class="col-md-8">
            <h4>{{trans('nedal.about_office')}} </h4>
            @if(getLang() =='ar')
            <p>{{about()->about_office}}</p>
                @else
                <p>{{about()->about_office_en}}</p>
                @endif
        </div>
    </div>
</div>
