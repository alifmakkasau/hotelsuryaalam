@extends('layouts.main')

@section('content')
<!-- ======= Tentang Kami ======= -->
<section class="about_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Tentang Kami</h2>
            <p>Hotel Surya Alam adalah penginapan yang mengutamakan kenyamanan, kebersihan, dan pelayanan ramah.
                Kami hadir untuk memberikan pengalaman menginap terbaik bagi Anda, baik untuk liburan maupun perjalanan bisnis.</p>
        </div>
    </div>
</section>

<!-- ======= Foto & Visi Misi ======= -->
<section class="photo_vision_area section_gap">
    <div class="container">
        <div class="row align-items-center">

            <!-- FOTO DI KIRI -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-center">
                <img src="{{ asset('template/image/tentang-hotel-surya-alam.jpg') }}" 
                     alt="Hotel Surya Alam"
                     style="width:100%; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
            </div>

            <!-- VISI & MISI DI KANAN -->
            <div class="col-lg-6 col-md-12">
                <div class="section_title">
                    <h2 class="title_color">Visi</h2>
                    <p>Menjadi hotel pilihan utama dengan pelayanan terbaik, kenyamanan maksimal, dan suasana yang menenangkan bagi setiap tamu.</p>
                </div>

                <div class="section_title mt-4">
                    <h2 class="title_color">Misi</h2>
                    <ul style="font-size: 16px; line-height: 1.8;">
                        <li>Memberikan layanan terbaik yang berorientasi pada kepuasan pelanggan.</li>
                        <li>Menjaga kebersihan dan kenyamanan lingkungan hotel.</li>
                        <li>Meningkatkan profesionalisme staf dan pelayanan ramah.</li>
                        <li>Mendukung pariwisata lokal dengan pelayanan berkualitas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area section_gap" style="background-color: #03091e;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>About Hotel</h4>
                <p>Hotel Surya Alam menghadirkan kenyamanan dan pelayanan terbaik di kawasan strategis Trans Kalimantan. Tempat ideal untuk beristirahat dengan suasana tenang dan fasilitas lengkap.</p>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Navigation Links</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/accomodation') }}">Kamar</a></li>
                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
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
</section>
@endsection
