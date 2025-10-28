@extends('layouts.main')

@section('content')
<section class="gallery_area section_gap">
    <div class="container text-center">
        <h2 class="title_color mb-4">Galeri Hotel Surya Alam</h2>
        <p class="mb-5">Suasana dan fasilitas terbaik untuk kenyamanan Anda.</p>

        <div class="row justify-content-center">
            <!-- Foto 1 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri1.jpg') }}" alt="Foto 1" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 2 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri2.jpg') }}" alt="Foto 2" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 3 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri3.jpg') }}" alt="Foto 3" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 4 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri4.jpg') }}" alt="Foto 4" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 5 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri5.jpg') }}" alt="Foto 5" class="img-fluid rounded">
                </div>
            </div>

            <!-- Foto 6 -->
            <div class="col-md-4 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('template/image/galeri6.jpg') }}" alt="Foto 6" class="img-fluid rounded">
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
@endsection
