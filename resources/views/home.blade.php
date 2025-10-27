@extends('layouts.main')

@section('title', 'Home')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax"
            style="background-image: url('{{ asset('template/image/hotel-surya-alam.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;"
            data-stellar-ratio="0.9"
            data-stellar-vertical-offset="0">
        </div>

        <div class="container">
            <div class="banner_content text-center">
                <h6>Nikmati pengalaman menginap terbaik</h6>
                <h2>Selamat Datang di Hotel Surya Alam</h2>
                <p>Tempat terbaik untuk bersantai dan menikmati kenyamanan Anda.</p>
                <a href="#" class="btn theme_btn button_hover">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
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

<!--================ Featured Room Area (Dipindah ke atas) =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Kamar Unggulan Kami</h2>
            <p>Kami menyediakan berbagai tipe kamar untuk kenyamanan Anda selama menginap.</p>
        </div>
        <div class="row mb_30">
            @foreach ($roomTypes as $room)
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="accomodation_item text-center shadow-sm rounded">
                        <div class="hotel_img position-relative">
                            @if ($room->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $room->images->first()->path) }}" alt="{{ $room->name }}" class="img-fluid rounded-top">
                            @else
                                <img src="{{ asset('template/image/room1.jpg') }}" alt="Default Room" class="img-fluid rounded-top">
                            @endif
                            <a href="#" class="btn theme_btn button_hover position-absolute bottom-0 start-50 translate-middle-x mb-2">
                                Pesan
                            </a>
                        </div>
                        <div class="p-3">
                            <h4 class="sec_h4">{{ $room->name }}</h4>
                            <h5>Rp{{ number_format($room->base_price, 0, ',', '.') }}<span>/malam</span></h5>
                            <p class="mt-2 text-muted">{{ Str::limit($room->description, 80) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ Featured Room Area =================-->

<!--================ About Area =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content">
                    <h2 class="title title_color">Tentang Kami<br> Hotel Surya Alam</h2>
                    <p>Hotel Surya Alam terletak di area strategis, tepat di kawasan Terminal ALBN dan berada di jalur Trans Kalimantan. Lokasinya yang mudah dijangkau menjadikan hotel ini pilihan ideal bagi tamu yang sedang transit maupun berlibur. Kami menawarkan kenyamanan menginap dengan layanan ramah, fasilitas lengkap, dan suasana yang tenang untuk beristirahat setelah perjalanan panjang.</p>
                    <a href="{{ route('about') }}" class="button_hover theme_btn_two">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('template/image/tentang-hotel-surya-alam.jpg') }}" alt="Tentang Hotel Surya Alam">

            </div>
        </div>
    </div>
</section>
<!--================ About Area =================-->

<!--================ Facilities Area =================-->
<section class="facilities_area section_gap">
   <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color" style="color: #ffffff;">Royal Facilities</h2>
            <p style="color: #ffffff;">Fasilitas lengkap untuk memastikan kenyamanan dan kepuasan Anda selama menginap.</p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-dinner"></i> Restoran</h4>
                    <p>Nikmati berbagai hidangan lokal dan internasional yang disajikan oleh koki profesional kami.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-laptop-phone"></i> Wi-Fi Gratis</h4>
                    <p>Akses internet cepat dan gratis di seluruh area hotel untuk kenyamanan Anda.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-car"></i> Area Parkir Luas</h4>
                    <p>Kami menyediakan area parkir luas yang aman dan nyaman bagi semua tamu hotel.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-camera-video"></i> CCTV 24 Jam</h4>
                    <p>Keamanan hotel dijaga selama 24 jam dengan sistem CCTV yang canggih.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-clock"></i> Layanan 24 Jam</h4>
                    <p>Staf kami siap membantu dan melayani kebutuhan Anda kapan saja, 24 jam penuh.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-magic-wand"></i> Mushola</h4>
                    <p>Tersedia mushola yang bersih dan nyaman bagi tamu muslim untuk beribadah.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================ Facilities Area =================-->
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
<!--================ Footer Area =================-->
@endsection
