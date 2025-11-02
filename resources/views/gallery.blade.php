@extends('layouts.main')

@section('content')
<!-- ======= Header Tentang Kami ======= -->
<section class="about_banner_area" 
    style="background: url('{{ asset('template/image/about-bg.jpg') }}') center center/cover no-repeat;
           height: 300px; display: flex; align-items: center; justify-content: center; color: white; position: relative;">
    <div style="background-color: rgba(0,0,0,0.4); position:absolute; top:0; left:0; width:100%; height:100%;"></div>
    <div class="container text-center" style="position: relative; z-index: 2;">
        <h1 style="font-weight: bold; font-size: 42px;">Galeri</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            <a href="{{ url('/') }}" style="color: #fff; text-decoration: none;">Home</a>
            <span style="margin: 0 8px;">&#x2192;</span>
            Galeri
        </p>
    </div>
</section>

<section class="gallery_area section_gap">
    <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="title_color mb-4">Galeri Hotel Surya Alam</h2>
        <p class="mb-5">Suasana dan fasilitas terbaik untuk kenyamanan Anda.</p>

        <div class="row justify-content-center">
            @foreach([
                'galeri1.jpg', 'galeri2.jpg', 'galeri3.jpg',
                'galeri4.jpg', 'galeri5.jpg', 'galeri6.jpg'
            ] as $index => $image)
                <div class="col-md-4 mb-4" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $index * 150 }}" 
                     data-aos-duration="800">
                   <div class="gallery-card">
                     <a href="{{ asset('template/image/' . $image) }}" data-lightbox="hotel-gallery" data-title="Foto {{ $index + 1 }}">
                        <img src="{{ asset('template/image/' . $image) }}" alt="Foto {{ $index + 1 }}" class="img-fluid rounded">
                    </a>
                    </div>
                </div>
            @endforeach
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
