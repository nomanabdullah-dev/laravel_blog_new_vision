<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>New Vision HTML CSS Template</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" /> <!-- https://fonts.google.com/specimen/Open+Sans?selection.family=Open+Sans -->
    <link href="{{ asset('public/theme/css/all.min.css') }}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{ asset('public/theme/slick/slick.css') }}" rel="stylesheet" /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{ asset('public/theme/slick/slick-theme.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/theme/css/bootstrap.min.css') }}" rel="stylesheet" /> <!-- https://getbootstrap.com -->
	<link href="{{ asset('public/theme/css/templatemo-new-vision.css') }}" rel="stylesheet" />
<!--

New Vision Template

https://templatemo.com/tm-542-new-vision

-->
<style>
    .f-active{
        color: #000;
        border-bottom: 5px solid #09F;
        border-left: none;
    }
</style>

</head>
<body>
    <div class="container-fluid">
        @include('header')
        @yield('content')
    </div>


    <script src="{{ asset('public/theme/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('public/theme/slick/slick.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/templatemo-script.js') }}"></script>
    @stack('footer-script')
    <script>
        jQuery(document).ready(function(){
            var pgurl = window.location.href;

            jQuery(".navbar-collapse ul li a").each(function(){
                if(jQuery(this).attr("href") == pgurl){
                    jQuery(this).addClass("f-active");
                }
            });
        });
    </script>
</body>
</html>
