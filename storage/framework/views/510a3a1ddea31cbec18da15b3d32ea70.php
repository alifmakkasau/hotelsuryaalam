

<?php $__env->startSection('content'); ?>
<!-- ======= Header Tentang Kami ======= -->
<section class="about_banner_area" 
    style="
        background: url('<?php echo e(asset('template/image/about-bg.jpg')); ?>') center center/cover no-repeat;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
    ">
    <div style="background-color: rgba(0,0,0,0.4); position:absolute; top:0; left:0; width:100%; height:100%;"></div>
    <div class="container text-center" style="position: relative; z-index: 2;">
        <h1 style="font-weight: bold; font-size: 42px;">Galeri</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            <a href="<?php echo e(url('/')); ?>" style="color: #fff; text-decoration: none;">Home</a>
            <span style="margin: 0 8px;">&#x2192;</span> <!-- Panah kanan -->
            Galeri
        </p>
    </div>
</section>
<section class="gallery_area section_gap">
    <div class="container text-center">
        <h2 class="title_color mb-4">Galeri Hotel Surya Alam</h2>
        <p class="mb-5">Suasana dan fasilitas terbaik untuk kenyamanan Anda.</p>

        <div class="row justify-content-center">
            <!-- Foto 1 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri1.jpg')); ?>" alt="Foto 1" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 2 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri2.jpg')); ?>" alt="Foto 2" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 3 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri3.jpg')); ?>" alt="Foto 3" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 4 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri4.jpg')); ?>" alt="Foto 4" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 5 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri5.jpg')); ?>" alt="Foto 5" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 6 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="<?php echo e(asset('template/image/galeri6.jpg')); ?>" alt="Foto 6" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ====== GALLERY STYLE ====== */
.gallery_area {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.gallery-card {
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.gallery-card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
}

.gallery-card:hover img {
    transform: scale(1.1);
}

.title_color {
    color: #000000;
    font-weight: 700;
}

@media (max-width: 767px) {
    .gallery-card img {
        height: 200px;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\HotelSuryaAlam\resources\views/gallery.blade.php ENDPATH**/ ?>