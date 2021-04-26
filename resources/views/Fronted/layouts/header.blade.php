<div class="header">
    <div class="nav-top">
        <div class="container-fluid topHeader">
            <div class="row">
                <div class="hidden-xs col-sm-6 col-md-6 ">
                </div>

                <div class=" col-sm-6 col-md-6 ">
                    <ul class="list-style-none">
                        <li class="left"><span>{{contact_us()->phone}}</span> <img src="/Fronted/images/icons/call.png"> </li>
                        <li class="left"> <span>{{contact_us()->email}}</span><img src="/Fronted/images/icons/envelope.png"> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="logo">
                <a class="navbar" href="/">
                    <img class="retina" src="/Fronted/images/logo.png" alt="logo">
                    <h3>مكتب نضال عطا محامون و مستشارون قانونيون</h3>
                    <p>LAWYERS AND LEGAL CONSULTANTS</p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="headerMain">
                    <ul class="main">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="{{route('General.about')}}">عن المكتب</a></li>
                        <li><a href="/">خدماتنا</a></li>
                        <li><a href="{{route('blog.allBlogs')}}">المدونة</a></li>
                        <li><a href="{{route('contact_us.contact_us')}}">تواصل معنا</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
