@extends('layouts.main')
@section('title', $roomType->name.' - Detail Kamar')

@section('content')
{{-- Hero kecil --}}

<section class="about_banner_area"
    style="background:url('{{ asset('template/image/about-bg.jpg') }}') center/cover no-repeat;height:260px;display:flex;align-items:center;justify-content:center;color:#fff;position:relative;">
  <div style="background:rgba(0,0,0,.45);position:absolute;inset:0;"></div>
  <div class="container text-center" style="position:relative;z-index:1;">
    <h1 class="fw-bold" style="font-size:40px;">{{ $roomType->name }}</h1>
    <p class="mt-2">
      <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
      <span class="mx-2">→</span>
      <a href="{{ route('accom.index') }}" class="text-white text-decoration-none">Kamar</a>
      <span class="mx-2">→</span>
      Detail
    </p>
  </div>
</section>

<section class="section_gap">
  <div class="container">
    <div class="row g-4">
      {{-- Gallery kiri --}}
      <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000">
        <div class="mb-3">
          @if($roomType->images->isNotEmpty())
            <img src="{{ asset('storage/'.$roomType->images->first()->path) }}" class="img-fluid rounded w-100" alt="">
          @else
            <img src="{{ asset('template/image/room1.jpg') }}" class="img-fluid rounded w-100" alt="">
          @endif
        </div>

```
    @if($roomType->images->count() > 1)
      <div class="d-flex gap-2 flex-wrap" data-aos="fade-up" data-aos-delay="150">
        @foreach($roomType->images->skip(1)->take(5) as $img)
          <img src="{{ asset('storage/'.$img->path) }}" class="img-fluid rounded" style="height:90px;width:auto;" alt="">
        @endforeach
      </div>
    @endif

    {{-- Detail --}}
    <div class="mt-4" data-aos="fade-up" data-aos-delay="200">
      <h3>Room Overview</h3>
      <p class="text-muted">{!! nl2br(e($roomType->description)) !!}</p>

      <div class="row mt-3">
        <div class="col-md-6" data-aos="fade-right" data-aos-delay="250">
          <h5>Room Facilities</h5>
           @if ($roomType->amenities->isNotEmpty())
            <ul class="list-unstyled small text-muted d-flex flex-wrap justify-content-left gap-2 mt-3">
              @foreach($roomType->amenities as $amenity)
                @php $icons = ['WiFi'=>'fa-wifi','AC'=>'fa-snowflake','TV'=>'fa-tv','Parking'=>'fa-car','Kamar mandi dalam'=>'fa-bath','Meja'=>'fa-chair','Balkon'=>'fa-building','Breakfast'=>'fa-utensils']; @endphp
                <li class="d-flex align-items-center bg-light px-2 py-1 rounded" style="gap:6px;">
                  <i class="fa-solid {{ $icons[$amenity->name] ?? 'fa-circle' }}" style="color:#f8b600;"></i>
                  <span>{{ $amenity->name }}</span>
                </li>
              @endforeach
            </ul>
          @endif
        </div>

        <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
          <h5>Room Info</h5>
          <ul class="list-unstyled text-muted">
            <li>Kapasitas: {{ $roomType->capacity }} orang</li>
            <li>Malam: {{ $nights }} malam</li>
            <li>Harga dasar: Rp{{ number_format($roomType->base_price,0,',','.') }}/malam</li>
            <li>Rata-rata periode: Rp{{ number_format($avgPrice,0,',','.') }}/malam</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  {{-- Sidebar booking --}}
  <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000">
    <div class="p-4 rounded shadow-sm booking-card" style="background:#020c28;">
      <h4 class="mb-1 text-white">
        IDR {{ number_format($avgPrice ?: $roomType->base_price,0,',','.') }}
        <small class="text-light">/ malam</small>
      </h4>
      <div class="mb-3 fw-semibold {{ $available ? 'text-success' : 'text-warning' }}">
        {{ $available ? 'Tersedia' : 'Penuh' }}
      </div>

      <form action="{{ route('booking.store') }}" method="POST" class="row g-3" data-aos="fade-up" data-aos-delay="200">
        @csrf
        <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">

        <div class="col-12">
          <label class="form-label small text-white">Check-in</label>
          <input type="date" name="check_in" class="form-control" value="{{ $check_in }}" required>
        </div>
        <div class="col-12">
          <label class="form-label small text-white">Check-out</label>
          <input type="date" name="check_out" class="form-control" value="{{ $check_out }}" required>
        </div>

        <div class="col-6">
          <label class="form-label small text-white">Kamar</label>
          <input type="number" name="qty" class="form-control" min="1" value="{{ $qty }}" required>
        </div>
        <div class="col-6">
          <label class="form-label small text-white">Dewasa</label>
          <select name="adults" class="form-select">
            @foreach(range(1,6) as $i)
              <option value="{{ $i }}" @selected($adults==$i)>{{ $i }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-12">
          <label class="form-label small text-white">Anak</label>
          <select name="children" class="form-select">
            @foreach(range(0,6) as $i)
              <option value="{{ $i }}" @selected($children==$i)>{{ $i }}</option>
            @endforeach
          </select>
        </div>

        <hr class="text-white-50 my-2">

        {{-- Urutan baru --}}
        <div class="col-12">
          <label class="form-label small text-white">Nama</label>
          <input type="text" name="name" class="form-control" required placeholder="Masukkan nama lengkap Anda">
        </div>
        <div class="col-12">
          <label class="form-label small text-white">Nomor Telepon</label>
          <input type="text" name="phone" class="form-control" required placeholder="Masukkan nomor telepon aktif">
        </div>
        <div class="col-12">
          <label class="form-label small text-white">Email (opsional)</label>
          <input type="email" name="email" class="form-control" placeholder="Masukkan email jika ada">
        </div>

        @error('qty')
          <div class="col-12 text-warning small">{{ $message }}</div>
        @enderror

        <div class="col-12 d-grid">
          <button class="btn" style="background:#f8b600;color:#000;font-weight:600;">BOOK NOW</button>
        </div>

        <div class="col-12 small text-light mt-1">
          *Harga final mengikuti tarif harian (weekend/season) saat submit.
        </div>
      </form>
    </div>

    <div class="mt-3 p-3 border rounded" data-aos="fade-up" data-aos-delay="150">
      <h6 class="mb-2">Kebijakan</h6>
      <ul class="small text-muted mb-0">
        <li>Check-in mulai 14.00, Check-out maksimal 12.00</li>
        <li>Gratis pembatalan H-1 (kecuali high season)</li>
      </ul>
    </div>
  </div>
</div>
  </div>
</section>

@push('styles')

<style>
.booking-card label,
.booking-card h4,
.booking-card .text-light { color:#fff !important; }

.booking-card .form-control,
.booking-card .form-select {
    color:#000 !important;
    background:#fff !important;
    border-color:#e5e7eb;
}
.booking-card .form-select option { color:#000; }
.booking-card ::placeholder { color:#6b7280; }
</style>

@endpush

@push('scripts')

<script>
AOS.init({
  once: true,
  duration: 800,
  offset: 120,
  easing: 'ease-in-out'
});
</script>

@endpush
@endsection
