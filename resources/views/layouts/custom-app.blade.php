<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Mohamed Nagy </title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('public/vendor/adminlte/dist/img/icon.png') }}">

    <!-- Core Style CSS -->

    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">

    <!-- Responsive CSS -->
    <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/core-style.css') }}">
    <style>
        .album-image {
            position: relative;
            display: inline-block;

        }
        .album-image .img-top {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;

        }
        .album-image:hover .img-top {
            display: inline;
        }
        .album-image:hover .img-bottom {
            opacity: 0;
        }

        .header-area.scrolled {
            background-color: #0e0e0e!important;
            transition: background-color 200ms linear;
        }

    </style>

</head>

<body>

<!-- Preloader -->
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('public/images/logo.png') }}" alt="" width="30px">
            </div>
        </div>
    </div>
</div>

<!-- Gradient Background Overlay -->
<div class="gradient-background-overlay"></div>

<!-- Header Area Start -->
<header class="header-area bg-img" >
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 h-100">
                <div class="main-menu h-100">
                    <nav class="navbar h-100 navbar-expand-lg">
                        <!-- Logo Area  -->
                        <a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('public/images/logo.png') }}" alt="Logo" width="200px" ></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> </button>

                        <div class="collapse navbar-collapse" id="studioMenu">
                            <!-- Menu Area Start  -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}"><span class="custom-nav-item {{ request()->route()->getName() === 'about' ?'active' : '' }}">Home</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('albums')}}"><span class="custom-nav-item {{ request()->route()->getName() === 'albums' ?'active' : '' }}">Albums</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('photography')}}"><span class="custom-nav-item {{ request()->route()->getName() === 'photography' ?'active' : '' }}">Photography</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
<!-- Social Sidebar Area Start -->
<!--
<button id="change"><a href="https://www.behance.net/HossamGhozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a></button>
<button id="blue"><a href="https://www.pinterest.com/Hossamghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></button>
<button id="green"><a href="https://www.facebook.com/hussam.taher.5680" target="_blank" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></button>
<button id="black" ><a href="https://www.instagram.com/hussam_ghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> </a></button>
<button id="information" style="border-bottom-right-radius: 10px"> <a  href="#" data-toggle="modal" data-target=".information-modal-lg"><i  class="fa fa-info-circle" aria-hidden="true"></i></a><br></button>
-->
@yield('content')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ asset('public/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('public/js/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('public/js/active.js') }}"></script>
<script src="{{ url('/public/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>


<script src="{{ asset('public/js/aos.js') }}"></script>
<script>
    AOS.init();
</script>
<script>
    $(window).on('load', function () {
        $('#preloader-active').delay(1).fadeOut('fast');
    });
</script>
@yield('script')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175433386-1"></script>
<script>

    $(function () {
        $(document).scroll(function () {
            var $nav = $(".header-area");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-175433386-1');
</script>
</body>
</html>
