<html>
@if(getLang() =='en')
    <html lang="en">
    @else
        <html lang="ar">

        @endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--Fav and touch icons-->
    <link rel="icon" href="/Fronted/images/logo.png">
    <link rel="apple-touch-icon" href="/Fronted/images/apple-touch-icon.png">
    <!--Common Styles Plugins-->

    <link rel="stylesheet" type="text/css" href="/Fronted/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/magnific-popup.css">

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!--Custom Style-->
    <link rel="stylesheet" type="text/css" href="/Fronted/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/space.css">
    <link rel="stylesheet" type="text/css" href="/Fronted/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/>
</head>
<body>

@include('Fronted.layouts.header')

@yield('content')

@include('Fronted.layouts.footer')

<a class="to-top" href="/">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

@yield('script')

<!--Common JS Plugin-->
<script type="text/javascript" src="/Fronted/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Fronted/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Fronted/js/retina.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js"></script>
<script type="text/javascript" src="/Fronted/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/Fronted/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/Fronted/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/Fronted/js/headroom.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jQuery.headroom.min.js"></script>
<script type="text/javascript" src="/Fronted/js/sticky-kit.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.waypoints.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/Fronted/js/jquery.counterup.min.js"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYMloK_kzsasOQXg-xhGxnwvlAU3HTZWg&libraries=places&center=21.6062004,39.1306194&callback=initMap"
        async defer></script>

<!-- Custom JS -->
<script type="text/javascript" src="/Fronted/js/custom.js"></script>
@yield('script')
</body>
</html>


