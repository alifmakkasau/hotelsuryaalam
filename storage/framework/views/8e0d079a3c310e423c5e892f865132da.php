<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<!-- Tambahkan AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax"
            style="background-image: url('<?php echo e(asset('template/image/hotel-surya-alam.jpg')); ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;">
        </div>

        <div class="container">
            <div class="banner_content text-center" data-aos="fade-up" data-aos-duration="1200">
                <h6 data-aos="fade-down" data-aos-delay="200">Nikmati pengalaman menginap terbaik</h6>
                <h2 data-aos="zoom-in" data-aos-delay="400">Selamat Datang di Hotel Surya Alam</h2>
                <p data-aos="fade-up" data-aos-delay="600">Tempat terbaik untuk bersantai dan menikmati kenyamanan Anda.</p>
                <a href="#" class="btn theme_btn button_hover" data-aos="zoom-in" data-aos-delay="800">Pesan Sekarang</a>
            </div>
        </div>
    </div>

    <div class="hotel_booking_area position" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Pilih<br> Kamar</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input type='text' class="form-control" placeholder="Tanggal Check-In" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" placeholder="Tanggal Check-Out" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
                                            <select class="wide">
                                                <option data-display="Tamu">Jumlah Tamu</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="book_tabel_item">
                                        <button type="submit" class="book_now_btn button_hover">Cek Kamar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Banner Area =================-->


<!--================ Featured Room Area =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center" data-aos="fade-up">
            <h2 class="title_color">Kamar Unggulan Kami</h2>
            <p>Kami menyediakan berbagai tipe kamar untuk kenyamanan Anda selama menginap.</p>
        </div>
        <div class="row mb_30">
            <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6 mb-4" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 150); ?>">
                    <div class="accomodation_item text-center shadow-sm rounded">
                        <div class="hotel_img position-relative">
                            <?php if($room->images->isNotEmpty()): ?>
                                <img src="<?php echo e(asset('storage/' . $room->images->first()->path)); ?>" alt="<?php echo e($room->name); ?>" class="img-fluid rounded-top">
                            <?php else: ?>
                                <img src="<?php echo e(asset('template/image/room1.jpg')); ?>" alt="Default Room" class="img-fluid rounded-top">
                            <?php endif; ?>
                            <a href="#" class="btn theme_btn button_hover position-absolute bottom-0 start-50 translate-middle-x mb-2">
                                Pesan
                            </a>
                        </div>
                        <div class="p-3">
                            <h4 class="sec_h4"><?php echo e($room->name); ?></h4>
                            <h5>Rp<?php echo e(number_format($room->base_price, 0, ',', '.')); ?><span>/malam</span></h5>
                            <p class="mt-2 text-muted"><?php echo e(Str::limit($room->description, 80)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!--================ Featured Room Area =================-->


<!--================ About Area =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center" data-aos="fade-right">
                <div class="about_content">
                    <h2 class="title title_color">Tentang Kami<br> Hotel Surya Alam</h2>
                    <p>Hotel Surya Alam terletak di area strategis, tepat di kawasan Terminal ALBN dan berada di jalur Trans Kalimantan...</p>
                    <a href="<?php echo e(route('about')); ?>" class="button_hover theme_btn_two">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="<?php echo e(asset('template/image/tentang-hotel-surya-alam.jpg')); ?>" alt="Tentang Hotel Surya Alam" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>
<!--================ About Area =================-->


<!--================ Facilities Area =================-->
<section class="facilities_area section_gap" 
    style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('<?php echo e(asset('template/image/fasilitashome.jpg')); ?>') center / cover no-repeat;">
   <div class="container">
        <div class="section_title text-center" data-aos="fade-up">
            <h2 class="title_color" style="color: #ffffff;">Hotel Surya Alam Facilities</h2>
            <p style="color: #ffffff;">Fasilitas lengkap untuk memastikan kenyamanan dan kepuasan Anda selama menginap.</p>
        </div>
        <div class="row mb_30">
            <?php
                $delay = 0;
            ?>
            <?php $__currentLoopData = [
                ['icon' => 'lnr-dinner', 'title' => 'Restoran', 'desc' => 'Tempat untuk makan dan bersantai.'],
                ['icon' => 'lnr-laptop-phone', 'title' => 'Wi-Fi Gratis', 'desc' => 'Akses internet cepat dan gratis.'],
                ['icon' => 'lnr-car', 'title' => 'Area Parkir Luas', 'desc' => 'Area parkir aman dan nyaman.'],
                ['icon' => 'lnr-camera-video', 'title' => 'CCTV 24 Jam', 'desc' => 'Keamanan terjamin dengan CCTV aktif.'],
                ['icon' => 'lnr-clock', 'title' => 'Layanan 24 Jam', 'desc' => 'Staf siap membantu kapan saja.'],
                ['icon' => 'lnr-magic-wand', 'title' => 'Mushola', 'desc' => 'Mushola bersih dan nyaman.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e($delay += 100); ?>">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr <?php echo e($facility['icon']); ?>"></i> <?php echo e($facility['title']); ?></h4>
                        <p><?php echo e($facility['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!--================ Facilities Area =================-->

<!-- Tambahkan AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\HotelSuryaAlam\resources\views/home.blade.php ENDPATH**/ ?>