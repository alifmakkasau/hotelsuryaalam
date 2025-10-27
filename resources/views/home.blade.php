@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h6>Nikmati pengalaman menginap terbaik</h6>
                    <h2>Selamat Datang di Royal Hotel</h2>
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
                                    {{--  <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                               <div class='input-group date' id='datetimepicker11'>
                                                    <input type="text" class="form-control" placeholder="Tanggal Check-in">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type="text" class="form-control" placeholder="Tanggal Check-out">
                                                </div>
                                            </div>
                                        </div>  --}}
                                        <div class="col-md-6">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker11'>
                                                    <input type='text' class="form-control" placeholder="Tanggal Check-In"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control" placeholder="Tanggal Check-Out"/>
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
                                    {{--  <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide">
                                                    <option data-display="Adult">Adult</option>
                                                    <option value="1">Old</option>
                                                    <option value="2">Younger</option>
                                                    <option value="3">Potato</option>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <select class="wide">
                                                    <option data-display="Child">Child</option>
                                                    <option value="1">Child</option>
                                                    <option value="2">Baby</option>
                                                    <option value="3">Child</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    {{--  <div class="col-md-2">
                                        <div class="book_tabel_item">
                                            <button type="submit" class="book_now_btn button_hover">Cek Kamar</button>
                                        </div>
                                    </div>  --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ About Area =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title title_color">Tentang Kami<br> Royal Hotel</h2>
                        <p>Royal Hotel menawarkan pengalaman menginap yang nyaman dan elegan dengan layanan premium dan fasilitas terbaik. Kami berada di lokasi strategis dekat pusat kota dan tempat wisata populer.</p>
                        <a href="#" class="button_hover theme_btn_two">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('template/image/about_bg.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--================ About Area =================-->

    <!--================ Featured Room Area =================-->
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
                            {{-- ambil gambar pertama dari relasi images --}}
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

    <!--================ Featured Room Area =================-->

    <!--================ Facilities Area =================-->
    <section class="facilities_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Royal Facilities</h2>
                <p>Fasilitas lengkap untuk memastikan kenyamanan dan kepuasan Anda selama menginap.</p>
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
                        <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i> Gym & Fitness</h4>
                        <p>Fasilitas olahraga lengkap untuk menjaga kebugaran Anda selama menginap di hotel kami.</p>
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
                        <h4 class="sec_h4"><i class="lnr lnr-apartment"></i> Ruang Meeting</h4>
                        <p>Tempat ideal untuk rapat, seminar, atau acara bisnis dengan fasilitas modern.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i> Lounge & Coffee Bar</h4>
                        <p>Ruang santai dengan suasana nyaman untuk menikmati kopi dan minuman favorit Anda.</p>
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

@endsection
