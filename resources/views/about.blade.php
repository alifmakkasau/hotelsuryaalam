@extends('layouts.main')

@section('content')
<!-- ======= Header Tentang Kami ======= -->
<section class="about_banner_area"
    style="
        background: url('{{ asset('template/image/about-bg.jpg') }}') center center/cover no-repeat;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
    ">
    <div style="background-color: rgba(0,0,0,0.4); position:absolute; top:0; left:0; width:100%; height:100%;"></div>
    <div class="container text-center" style="position: relative; z-index: 2;">
        <h1 style="font-weight: bold; font-size: 42px;">Tentang Kami</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            <a href="{{ url('/') }}" style="color: #fff; text-decoration: none;">Home</a>
            <span style="margin: 0 8px;">&#x2192;</span> <!-- Panah kanan -->
            Tentang Kami
        </p>
    </div>
</section>

<!-- ======= Tentang Kami ======= -->
<section class="about_area section_gap" style="margin-bottom: 100px;">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Tentang Kami</h2>
            </div>

           {{-- Deskripsi --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article class="lead" style="text-align: justify;">
                        <p>
                            Hotel Surya Alam merupakan penginapan yang mengutamakan kenyamanan, kebersihan, serta
                            pelayanan yang ramah dan profesional. Kami berkomitmen untuk memberikan pengalaman
                            menginap terbaik bagi setiap tamu, baik yang sedang berlibur maupun melakukan perjalanan bisnis.
                        </p>
                        <p>
                            Berlokasi strategis di jalur utama Trans Kalimantan dan berdekatan dengan Terminal ALBN,
                            Hotel Surya Alam menjadi pilihan ideal bagi para wisatawan maupun pelaku perjalanan yang
                            mencari akomodasi dengan akses mudah dan lingkungan yang tenang.
                        </p>
                        <p class="mb-2">
                            Untuk menunjang kenyamanan Anda, Hotel Surya Alam dilengkapi dengan berbagai fasilitas unggulan:
                        </p>
                        <ul class="mb-0">
                            <li>Kamar ber-AC yang bersih, nyaman, dan tertata rapi</li>
                            <li>Akses Wi-Fi gratis 24 jam</li>
                            <li>Restoran dengan sajian menu pilihan</li>
                            <li>Layanan resepsionis 24 jam</li>
                            <li>Area parkir luas dan aman</li>
                            <li>Mushola yang bersih dan nyaman</li>
                        </ul>
                        <p class="mt-3 mb-0">
                            Dengan kombinasi lokasi strategis, fasilitas lengkap, dan pelayanan terbaik, Hotel Surya Alam
                            bertekad menjadi tempat istirahat yang memberikan ketenangan, kepuasan, serta pengalaman
                            menginap yang berkesan bagi setiap tamu.
                        </p>
                    </article>
                </div>
            </div>

            {{-- Foto + Visi Misi (jarak dekat dari deskripsi) --}}
            <div class="row align-items-center gy-4 mt-4">
                {{-- Foto --}}
                <div class="col-lg-6 col-md-12 text-center">
                    <figure class="m-0">
                        <img
                            src="{{ asset('template/image/aboutpage.jpg') }}"
                            alt="Tampilan Hotel Surya Alam"
                            class="img-fluid rounded-3 shadow"
                            loading="lazy">
                    </figure>
                </div>

                {{-- Visi & Misi --}}
                <div class="col-lg-6 col-md-12">
                    <div class="section_title mb-3">
                        <h2 class="title_color mb-2">Visi</h2>
                         <article class="lead" style="text-align: justify;">
                                Menjadi hotel pilihan utama dengan pelayanan terbaik, kenyamanan maksimal, dan suasana
                                yang menenangkan bagi setiap tamu.
                         </article>
                    </div>

                    <div class="section_title">
                        <h2 class="title_color mb-2">Misi</h2>
                         <article class="lead" style="text-align: justify;">
                            <ul class="mb-0" style="line-height: 1.8; text-align: justify;">
                                <li>Memberikan layanan terbaik yang berorientasi pada kepuasan pelanggan.</li>
                                <li>Menjaga kebersihan dan kenyamanan lingkungan hotel.</li>
                                <li>Meningkatkan profesionalisme staf dan pelayanan ramah.</li>
                                <li>Mendukung pariwisata lokal dengan pelayanan berkualitas.</li>
                            </ul>
                         </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
