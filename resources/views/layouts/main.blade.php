<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('template/image/favicon.png') }}" type="image/png">
    <title>@yield('title', 'Hotel Surya Alam')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">
</head>

<body>

 <!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo_h" href="{{ route('home') }}">
                <img src="{{ asset('template/image/logo.png') }}" alt="Hotel Surya Alam" style="max-height: 50px; width: auto;">
                <span style="font-weight:bold; font-size:20px; color:#5a3825;"></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('accommodation') }}">Kamar</a>
                    </li>

                    <li class="nav-item {{ request()->is('gallery') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gallery') }}">Galeri</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
</li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================Header Area =================-->


    <!--================ Main Content =================-->
    @yield('content')
    <!--================ End Main Content =================-->

    <!--================ Footer Area =================-->
    <footer class="footer-area section_gap" style="background-color: #03091e;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>About Hotel</h4>
                <p>Hotel Surya Alam menghadirkan kenyamanan dan pelayanan terbaik di kawasan strategis Trans Kalimantan. Tempat ideal untuk beristirahat dengan suasana tenang dan fasilitas lengkap.</p>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Navigation Links</h4>
                <ul class="list">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
    <li><a href="{{ route('gallery') }}">Galeri</a></li>
    <li><a href="{{ route('accommodation') }}">Kamar</a></li>
    <li><a href="{{ route('contact') }}">Kontak</a></li>

</ul>

            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Newsletter</h4>
                <p>Dapatkan info promo dan berita terbaru dari Hotel Surya Alam.</p>
                <form action="#" class="form-inline">
                    <input type="email" class="form-control" placeholder="Email Anda" onfocus="this.placeholder=''" onblur="this.placeholder='Email Anda'">
                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"></i></button>
                </form>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Follow Us</h4>
                <div class="footer-social d-flex align-items-center">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap mt-4 pt-3 border-top">
            <p class="footer-text m-0 text-white">
                Copyright ©2025 Hotel Surya Alam. All rights reserved.
            </p>
            <div class="footer-social d-flex align-items-center">
                <a href="#"><i class="fa fa-facebook text-white"></i></a>
                <a href="#"><i class="fa fa-twitter text-white"></i></a>
                <a href="#"><i class="fa fa-instagram text-white"></i></a>
            </div>
        </div>
    </div>
</footer>
    <!--================ End Footer Area =================-->

    <!--================ Script =================-->
    {{--  <script src="{{ asset('template/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('template/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('template/js/stellar.js') }}"></script>
    <script src="{{ asset('template/js/theme.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>  --}}

        <script src="{{ asset('template/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('template/js/popper.js') }}"></script>
        <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('template/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('template/js/mail-script.js') }}"></script>
        <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('template/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('template/js/mail-script.js') }}"></script>
        <script src="{{ asset('template/js/stellar.js') }}"></script>
        <script src="{{ asset('template/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('template/js/custom.js') }}"></script>

</body>
</html>
