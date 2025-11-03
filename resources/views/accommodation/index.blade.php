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

<section class="accomodation_area section_gap">
  <div class="container">
    <div class="section_title text-center" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="title_color">Special Accommodation</h2>
      <p>Temukan berbagai pilihan kamar terbaik kami yang dirancang untuk kenyamanan Anda.</p>
    </div>

```
<div class="row mb_30">
  @foreach($rooms as $room)
    <div class="col-lg-3 col-sm-6 mb-4" 
         data-aos="zoom-in" 
         data-aos-duration="800" 
         data-aos-delay="{{ $loop->index * 150 }}">
      <div class="accomodation_item text-center shadow-sm rounded" style="border:1px solid #eee;">
        <div class="hotel_img position-relative">
          @if ($room->images->isNotEmpty())
            <img src="{{ asset('storage/'.$room->images->first()->path) }}" alt="{{ $room->name }}" class="img-fluid rounded-top">
          @else
            <img src="{{ asset('template/image/room1.jpg') }}" alt="Default Room" class="img-fluid rounded-top">
          @endif

          <a
            href="{{ route('accom.show', $room->slug) }}?check_in={{ request('check_in', now()->toDateString()) }}&check_out={{ request('check_out', now()->addDay()->toDateString()) }}&qty={{ request('qty',1) }}&adults={{ request('adults',2) }}&children={{ request('children',0) }}"
            class="btn theme_btn button_hover position-absolute bottom-0 start-50 translate-middle-x mb-2"
            style="background-color:#f8b600;color:#000;font-weight:600;">
            BOOK NOW
          </a>
        </div>

        <div class="p-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
          <h4 class="sec_h4">{{ $room->name }}</h4>
          <h5>Rp{{ number_format($room->base_price,0,',','.') }}<span>/malam</span></h5>
          <p class="mt-2 text-muted">{{ Str::limit($room->description, 80) }}</p>

          @if ($room->amenities->isNotEmpty())
            <ul class="list-unstyled small text-muted d-flex flex-wrap justify-content-center gap-2 mt-3">
              @foreach($room->amenities as $amenity)
                @php $icons = ['WiFi'=>'fa-wifi','AC'=>'fa-snowflake','TV'=>'fa-tv','Parking'=>'fa-car','Kamar mandi dalam'=>'fa-bath','Meja'=>'fa-chair','Balkon'=>'fa-building','Breakfast'=>'fa-utensils']; @endphp
                <li class="d-flex align-items-center bg-light px-2 py-1 rounded" style="gap:6px;">
                  <i class="fa-solid {{ $icons[$amenity->name] ?? 'fa-circle' }}" style="color:#f8b600;"></i>
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
```

  </div>
</section>

<!--================ Facilities Area =================-->

<section class="facilities_area section_gap" 
    style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('{{ asset('template/image/fasilitashome.jpg') }}') center / cover no-repeat;">
   <div class="container">
        <div class="section_title text-center" data-aos="fade-up">
            <h2 class="title_color" style="color: #ffffff;">Hotel Surya Alam Facilities</h2>
            <p style="color: #ffffff;">Fasilitas lengkap untuk memastikan kenyamanan dan kepuasan Anda selama menginap.</p>
        </div>
        <div class="row mb_30">
            @php
                $delay = 0;
            @endphp
            @foreach ([ 
                ['icon' => 'lnr-dinner', 'title' => 'Restoran', 'desc' => 'Tempat untuk makan dan bersantai.'],
                ['icon' => 'lnr-laptop-phone', 'title' => 'Wi-Fi Gratis', 'desc' => 'Akses internet cepat dan gratis.'],
                ['icon' => 'lnr-car', 'title' => 'Area Parkir Luas', 'desc' => 'Area parkir aman dan nyaman.'],
                ['icon' => 'lnr-camera-video', 'title' => 'CCTV 24 Jam', 'desc' => 'Keamanan terjamin dengan CCTV aktif.'],
                ['icon' => 'lnr-clock', 'title' => 'Layanan 24 Jam', 'desc' => 'Staf siap membantu kapan saja.'],
                ['icon' => 'lnr-magic-wand', 'title' => 'Mushola', 'desc' => 'Mushola bersih dan nyaman.'],
            ] as $facility)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay += 100 }}">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr {{ $facility['icon'] }}"></i> {{ $facility['title'] }}</h4>
                        <p>{{ $facility['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ Facilities Area =================-->

@endsection

@push('scripts')

<script>
  AOS.init({
    once: true,
    offset: 120,
    easing: 'ease-in-out',
    duration: 800
  });
</script>

@endpush
