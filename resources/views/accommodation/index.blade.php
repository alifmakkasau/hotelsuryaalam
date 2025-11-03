{{-- resources/views/frontend/accommodation/index.blade.php --}}
@extends('layouts.main')
@section('title', 'Accommodation - Hotel Surya Alam')

@section('content')
{{-- ... banner tetap ... --}}

<section class="accomodation_area section_gap">
  <div class="container">
    <div class="section_title text-center">
      <h2 class="title_color">Special Accommodation</h2>
      <p>Temukan berbagai pilihan kamar terbaik kami yang dirancang untuk kenyamanan Anda.</p>
    </div>

    <div class="row mb_30">
      @foreach($rooms as $room)
        <div class="col-lg-3 col-sm-6 mb-4">
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

            <div class="p-3">
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
  </div>
</section>

{{-- Booking strip (bawah) tetap boleh, atau arahkan ke /accommodation?params --}}
@endsection
