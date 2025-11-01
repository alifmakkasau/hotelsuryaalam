<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo e(asset('template/image/favicon.png')); ?>" type="image/png">
    <title><?php echo $__env->yieldContent('title', 'Hotel Surya Alam'); ?></title>

    <!-- Bootstrap & Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('template/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/vendors/linericon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/vendors/owl-carousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/vendors/nice-select/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/vendors/lightbox/simpleLightbox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('template/css/responsive.css')); ?>">

    <!-- ✅ Font Awesome CDN untuk ikon fasilitas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
          integrity="sha512-1ycn6Ica9993+I8k5Jf5RAKOB1p5MNp8zFJY9lZz3eA6JY5sm+d5ZqDgD9E6z7Qx+0Z5N7x4zS0X1GgZj+7xwg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ✅ Tambahkan CSS AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

<!--================ Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo_h" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('template/image/logo.png')); ?>" alt="Hotel Surya Alam" style="max-height: 50px; width: auto;">
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
                    <li class="nav-item <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('about') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('about')); ?>">Tentang Kami</a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('accommodation') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('accommodation')); ?>">Kamar</a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('gallery') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('gallery')); ?>">Galeri</a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('contact') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('contact')); ?>">Kontak</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Area =================-->

<!--================ Main Content =================-->
<?php echo $__env->yieldContent('content'); ?>
<!--================ End Main Content =================-->

<!--================ Footer Area =================-->
<footer class="footer-area" style="background-color: #03091e; padding: 60px 0 0 0;">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>About Hotel</h4>
                <p>Hotel Surya Alam menghadirkan kenyamanan dan pelayanan terbaik di kawasan strategis Trans Kalimantan. Tempat ideal untuk beristirahat dengan suasana tenang dan fasilitas lengkap.</p>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Navigation Links</h4>
                <ul class="list">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>">Tentang Kami</a></li>
                    <li><a href="<?php echo e(route('gallery')); ?>">Galeri</a></li>
                    <li><a href="<?php echo e(route('accommodation')); ?>">Kamar</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Newsletter</h4>
                <p>Dapatkan info promo dan berita terbaru dari Hotel Surya Alam.</p>
                <form action="#" class="form-inline">
                    <input type="email" class="form-control" placeholder="Email Anda" 
                           onfocus="this.placeholder=''" onblur="this.placeholder='Email Anda'">
                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"></i></button>
                </form>
            </div>

            <!-- ✅ Bagian baru: Kontak + Maps -->
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Kontak Hotel Surya Alam</h4>
                <p>Hubungi kami untuk informasi dan reservasi:</p>
                <p>
                    <a href="https://wa.me/6285348404764" target="_blank" 
                       style="color: #fff; text-decoration: none;">
                        <i class="fa fa-whatsapp" style="color: #25D366; margin-right: 8px;"></i>
                        0853-4840-4764
                    </a>
                </p>
                <div style="border-radius: 8px; overflow: hidden;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817430245018!2d109.41083117501212!3d-0.03827189996134787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d57089995d2ab%3A0x58d1085fdf3da3fc!2sHOTEL%20%26%20RESTORAN%20SURYA%20ALAM!5e0!3m2!1sen!2sid!4v1761668654158!5m2!1sen!2sid" 
                        width="100%" height="160" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center py-3 border-top" 
     style="margin-bottom: 0; background-color: #03091e;">
    <p class="footer-text m-0 text-white" style="font-size: 15px;">
        © 2025 Hotel Surya Alam. All rights reserved.
    </p>
</div>

    </div>
</footer>
<!--================ End Footer Area =================-->


<!--================ Script =================-->
<script src="<?php echo e(asset('template/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/popper.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/vendors/owl-carousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/jquery.ajaxchimp.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/mail-script.js')); ?>"></script>
<script src="<?php echo e(asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/vendors/nice-select/js/jquery.nice-select.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/stellar.js')); ?>"></script>
<script src="<?php echo e(asset('template/vendors/lightbox/simpleLightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/js/custom.js')); ?>"></script>

<!-- ✅ Tambahkan JS AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,  // durasi animasi (ms)
    once: true,      // animasi hanya muncul sekali
    offset: 120      // jarak scroll sebelum animasi mulai
  });
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\HotelSuryaAlam\resources\views/layouts/main.blade.php ENDPATH**/ ?>