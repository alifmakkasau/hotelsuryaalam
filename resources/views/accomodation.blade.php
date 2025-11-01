@extends('layouts.main')

@section('title', 'Accommodation - Hotel Surya Alam')

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
        <h1 style="font-weight: bold; font-size: 42px;">Kamar</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            <a href="{{ url('/') }}" style="color: #fff; text-decoration: none;">Home</a>
            <span style="margin: 0 8px;">&#x2192;</span>
            Kamar
        </p>
    </div>
</section>

<!--================ Accommodation Area =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Special Accommodation</h2>
            <p>Temukan berbagai pilihan kamar terbaik kami yang dirancang untuk kenyamanan Anda.</p>
        </div>

        <div class="row mb_30">
            @foreach($rooms as $room)
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="accomodation_item text-center shadow-sm rounded" style="border: 1px solid #eee;">
                        <div class="hotel_img position-relative">
                            @if ($room->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $room->images->first()->path) }}" 
                                    alt="{{ $room->name }}" 
                                    class="img-fluid rounded-top">
                            @else
                                <img src="{{ asset('template/image/room1.jpg') }}" 
                                    alt="Default Room" 
                                    class="img-fluid rounded-top">
                            @endif

                            <a href="{{ route('accommodation.detail', $room->id) }}" 
   class="btn theme_btn button_hover position-absolute bottom-0 start-50 translate-middle-x mb-2"
   style="background-color: #f8b600; color: #000; font-weight: 600;">
    LIHAT DETAIL
</a>

                        </div>

                        <div class="p-3">
                            <h4 class="sec_h4">{{ $room->name }}</h4>
                            <h5>Rp{{ number_format($room->base_price, 0, ',', '.') }}<span>/malam</span></h5>
                            <p class="mt-2 text-muted">{{ Str::limit($room->description, 80) }}</p>

                            <!-- ✅ Daftar fasilitas dengan ikon (versi kamu yang diperbarui) -->
                            @if ($room->amenities->isNotEmpty())
    <ul class="list-unstyled small text-muted d-flex flex-wrap justify-content-center gap-2 mt-3">
        @foreach($room->amenities as $amenity)
            @php
                $icons = [
                    'WiFi' => 'fa fa-wifi',
                    'AC' => 'fa fa-snowflake-o',
                    'TV' => 'fa fa-tv',
                    'Parking' => 'fa fa-car',
                    'Kamar mandi dalam' => 'fa fa-bathtub',
                    'Meja' => 'fa fa-chair',
                    'Balkon' => 'fa fa-building',
                    'Breakfast' => 'fa fa-cutlery',
                ];
                $icon = $icons[$amenity->name] ?? 'fa fa-circle';
            @endphp
            <li class="d-flex align-items-center bg-light px-2 py-1 rounded" style="gap:6px;">
                <i class="{{ $icon }}" style="color:#f8b600;"></i>
                <span>{{ $amenity->name }}</span>
            </li>
        @endforeach
    </ul>
@endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Accommodation Area =================-->


<!--================ Booking Form Area =================-->
<section class="hotel_booking_area mt-5" style="background-color: #020c28; padding: 50px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-12 text-white mb-4 mb-lg-0">
                <h3 style="font-weight: 700;">BOOK<br>YOUR ROOM</h3>
            </div>
            <div class="col-lg-9 col-md-12">
                <form action="#" method="GET">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="check_in" placeholder="Arrival Date">
                        </div>

                        <div class="col-md-3">
                            <input type="date" class="form-control" name="check_out" placeholder="Departure Date">
                        </div>

                        <div class="col-md-2">
                            <select class="form-select" name="adults">
                                <option value="">Adult</option>
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select class="form-select" name="children">
                                <option value="">Child</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn w-100" 
                                style="background-color: #f8b600; color: #000; font-weight: 600;">
                                BOOK NOW
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================ End Booking Form Area =================-->
@endsection
