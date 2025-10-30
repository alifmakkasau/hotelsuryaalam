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
            <p style="text-align: justify;">
                Hotel Surya Alam merupakan penginapan yang mengutamakan kenyamanan, kebersihan, serta pelayanan yang ramah dan profesional. 
                Kami berkomitmen untuk memberikan pengalaman menginap terbaik bagi setiap tamu, baik yang sedang berlibur maupun melakukan perjalanan bisnis.
                <br><br>
                Berlokasi strategis di jalur utama Trans Kalimantan dan berdekatan dengan Terminal ALBN, Hotel Surya Alam menjadi pilihan ideal bagi para wisatawan maupun pelaku perjalanan yang mencari akomodasi dengan akses mudah dan lingkungan yang tenang.
                <br><br>
                Untuk menunjang kenyamanan Anda, Hotel Surya Alam dilengkapi dengan berbagai fasilitas unggulan, di antaranya:
                <br><br>
                Kamar ber-AC yang bersih, nyaman, dan tertata rapi<br>
                Akses Wi-Fi gratis 24 jam<br>
                Restoran dengan sajian menu pilihan<br>
                Layanan resepsionis 24 jam<br>
                Area parkir luas dan aman<br>
                Mushola yang bersih dan nyaman<br><br>
                Dengan kombinasi antara lokasi strategis, fasilitas lengkap, dan pelayanan terbaik, Hotel Surya Alam bertekad menjadi tempat istirahat yang memberikan ketenangan, kepuasan, serta pengalaman menginap yang berkesan bagi setiap tamu.
            </p>
        </div>
    </div>
</section>

<!-- ======= Foto & Visi Misi ======= -->
<section class="vision_area" style="padding-bottom: 40px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- FOTO DI KIRI -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-center">
                <img src="{{ asset('template/image/aboutpage.jpg')}}" 
                     alt="Hotel Surya Alam"
                     style="width:100%; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
            </div>

            <!-- VISI & MISI DI KANAN -->
            <div class="col-lg-6 col-md-12">
                <div class="section_title">
                    <h2 class="title_color">Visi</h2>
                    <p style="text-align: justify;">
                        Menjadi hotel pilihan utama dengan pelayanan terbaik, kenyamanan maksimal, dan suasana yang menenangkan bagi setiap tamu.
                    </p>
                </div>

                <div class="section_title mt-4">
                    <h2 class="title_color">Misi</h2>
                    <ul style="font-size: 16px; line-height: 1.8; text-align: justify;">
                        <li>Memberikan layanan terbaik yang berorientasi pada kepuasan pelanggan.</li>
                        <li>Menjaga kebersihan dan kenyamanan lingkungan hotel.</li>
                        <li>Meningkatkan profesionalisme staf dan pelayanan ramah.</li>
                        <li>Mendukung pariwisata lokal dengan pelayanan berkualitas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

