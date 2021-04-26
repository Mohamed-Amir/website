<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer_item">
                <div class="footer_item">
                    <img src="/Fronted/images/about_us.png">
                  <a href="{{route('General.about')}}" ><h1>{{trans('nedal.About_us')}}</h1></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_item">
                    <img src="/Fronted/images/email.png">
                    <h1>{{contact_us()->email}}</h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_item">
                    <img src="/Fronted/images/address.png">
                    <h1>{{contact_us()->address}}</h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_item">
                    <img src="/Fronted/images/phone.png">
                    <h1>{{contact_us()->phone}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
