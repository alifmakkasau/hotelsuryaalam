{{-- resources/views/accomodation.blade.php --}}
@extends('layouts.main')
@section('title', 'Accommodation - Hotel Surya Alam')

@section('content')
<!-- ======= Header Kamar ======= -->
<section class="about_banner_area"
    style="background: url('{{ asset('template/image/about-bg.jpg') }}') center center/cover no-repeat;
           height: 300px; display: flex; align-items: center; justify-content: center; color: white; position: relative;">
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
<section class="accomodation_area section_gap" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="section_title text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="title_color">Special Accommodation</h2>
            <p>Temukan berbagai pilihan kamar terbaik kami yang dirancang untuk kenyamanan Anda.</p>
        </div>

        <div class="row mb_30">
            @foreach($rooms as $index => $room)
                <div class="col-lg-3 col-sm-6 mb-4"
                     data-aos="fade-up"
                     data-aos-delay="{{ $index * 100 }}"
                     data-aos-duration="800">
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

                            <a href="{{ route('accom.show', $room) }}?check_in={{ request('check_in', now()->toDateString()) }}&check_out={{ request('check_out', now()->addDay()->toDateString()) }}&qty={{ request('qty',1) }}&adults={{ request('adults',2) }}&children={{ request('children',0) }}"
                                class="btn theme_btn button_hover position-absolute bottom-0 start-50 translate-middle-x mb-2"
                                style="background-color:#f8b600; color:#000; font-weight:600;">
                                BOOK NOW
                            </a>
                        </div>

                        <div class="p-3">
                            <h4 class="sec_h4">{{ $room->name }}</h4>
                            <h5>Rp{{ number_format($room->base_price, 0, ',', '.') }}<span>/malam</span></h5>
                            <p class="mt-2 text-muted">{{ Str::limit($room->description, 80) }}</p>

                            @if ($room->amenities->isNotEmpty())
                                <ul class="list-unstyled small text-muted d-flex flex-wrap justify-content-center gap-2 mt-3">
                                    @foreach($room->amenities as $amenity)
                                        @php
                                            $icons = [
                                                'WiFi' => 'fa-wifi',
                                                'AC' => 'fa-snowflake',
                                                'TV' => 'fa-tv',
                                                'Parking' => 'fa-car',
                                                'Kamar mandi dalam' => 'fa-bath',
                                                'Meja' => 'fa-chair',
                                                'Balkon' => 'fa-building',
                                                'Breakfast' => 'fa-utensils',
                                            ];
                                            $icon = $icons[$amenity->name] ?? 'fa-circle';
                                        @endphp
                                        <li class="d-flex align-items-center bg-light px-2 py-1 rounded" style="gap:6px;">
                                            <i class="fa-solid {{ $icon }}" style="color:#f8b600;"></i>
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

<!--================ Booking Strip Area (opsional) =================-->
<section class="hotel_booking_area mt-5" style="background-color: #020c28; padding: 50px 0;" 
         data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-12 text-white mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <h3 style="font-weight: 700;">BOOK<br>YOUR ROOM</h3>
            </div>
            <div class="col-lg-9 col-md-12" data-aos="fade-left" data-aos-duration="1000">
                <form action="{{ route('accom.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="check_in" placeholder="Arrival Date" value="{{ request('check_in') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="check_out" placeholder="Departure Date" value="{{ request('check_out') }}">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="adults">
                                <option value="">Adult</option>
                                <option value="1" {{ request('adults') == 1 ? 'selected' : '' }}>1 Adult</option>
                                <option value="2" {{ request('adults') == 2 ? 'selected' : '' }}>2 Adults</option>
                                <option value="3" {{ request('adults') == 3 ? 'selected' : '' }}>3 Adults</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="children">
                                <option value="">Child</option>
                                <option value="0" {{ request('children') == 0 ? 'selected' : '' }}>0</option>
                                <option value="1" {{ request('children') == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ request('children') == 2 ? 'selected' : '' }}>2</option>
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
@endsection
