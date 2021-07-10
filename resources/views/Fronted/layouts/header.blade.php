<section class="topnavbar">
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <ul class="socialNav">
                    <li> <i class="fa fa-envelope-o"></i> {{about()->email}}</li>
                    <li> <i class="fa fa-phone"></i>{{about()->phone}}</li>
                </ul>
            </div>

        </div>
    </div>
</section>
<div class="">
    <nav class="navbar">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggler" data-toggle="open-navbar1">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="/">
                    <img src="{{getImageUrl('Main_info',about()->logo)}}" style="height: 70px;width: 110px">
                </a>
            </div>

            <div class="navbar-menu" id="open-navbar1">
                <ul class="navbar-nav">
                    <li @if(isset($active) AND $active ==1) class="active" @endif><a href="/">الرئيسية</a></li>
                    <li @if(isset($active) AND $active ==5) class="active" @endif><a href="/question">الاستبيان</a></li>
                    @if(!Auth::check())
                    <li><button class="btn btn-login" onclick="location.href='/loginForm'" type="button"><i class="fa fa-sign-in"></i>
                            تسجيل الدخول
                        </button></li>
                        @else
                        <li><button class="btn btn-danger" onclick="location.href='/logout/logout'" type="button"><i class="fa fa-sign-in"></i>
                                تسجيل الخروج
                            </button></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>