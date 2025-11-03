@extends('layouts.main')
@section('title', 'Detail Booking - '.$booking->code)

@section('content')
{{-- Hero --}}
<section class="about_banner_area"
    style="background:url('{{ asset('template/image/about-bg.jpg') }}') center/cover no-repeat;height:260px;display:flex;align-items:center;justify-content:center;color:#fff;position:relative;">
  <div style="background:rgba(0,0,0,.45);position:absolute;inset:0;"></div>
  <div class="container text-center" style="position:relative;z-index:1;">
    <h1 class="fw-bold" style="font-size:40px;">Detail Booking</h1>
    <p class="mt-2">
      <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
      <span class="mx-2">→</span>
      <a href="{{ route('accom.index') }}" class="text-white text-decoration-none">Accommodation</a>
      <span class="mx-2">→</span>
      Booking #{{ $booking->code }}
    </p>
  </div>
</section>

<section class="section_gap">
  <div class="container">

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
      {{-- Kiri: ringkasan & rincian --}}
      <div class="col-lg-8">
        <div class="bg-white rounded shadow-sm p-4">

          {{-- Header --}}
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div>
              <div class="text-muted small">Kode Booking</div>
              <h3 class="mb-0">{{ $booking->code }}</h3>
            </div>
            <div>
              @php
                $status = $booking->status;
                $map = [
                  'pending'     => ['label'=>'Pending','class'=>'bg-warning text-dark'],
                  'confirmed'   => ['label'=>'Confirmed','class'=>'bg-success'],
                  'checked_in'  => ['label'=>'Check-In','class'=>'bg-info text-dark'],
                  'checked_out' => ['label'=>'Check-Out','class'=>'bg-secondary'],
                  'cancelled'   => ['label'=>'Cancelled','class'=>'bg-danger'],
                ];
                $badge = $map[$status] ?? ['label'=>ucfirst($status),'class'=>'bg-secondary'];
              @endphp
              <span class="badge {{ $badge['class'] }} px-3 py-2">{{ $badge['label'] }}</span>
            </div>
          </div>

          <hr>

          {{-- Info Utama --}}
          <div class="row g-3">
            <div class="col-md-6">
              <div class="text-muted small">Tamu</div>
              <div class="fw-semibold">{{ $booking->guest->name }}</div>
              <div class="text-muted small">
                {{ $booking->guest->email ?? '—' }}
                @if($booking->guest->phone) · {{ $booking->guest->phone }} @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-muted small">Tipe Kamar</div>
              <div class="fw-semibold">{{ $booking->roomType->name }}</div>
              <div class="text-muted small">Kapasitas {{ $booking->roomType->capacity }} org</div>
            </div>

            <div class="col-md-4">
              <div class="text-muted small">Check-in</div>
              <div class="fw-semibold">
                {{ \Carbon\Carbon::parse($booking->check_in)->isoFormat('dddd, D MMM YYYY') }}
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-muted small">Check-out</div>
              <div class="fw-semibold">
                {{ \Carbon\Carbon::parse($booking->check_out)->isoFormat('dddd, D MMM YYYY') }}
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-muted small">Jumlah Kamar</div>
              <div class="fw-semibold">{{ $booking->qty }}</div>
            </div>
          </div>

          <hr>

          {{-- Rincian Biaya --}}
          @php
            $nights = max(1, \Carbon\Carbon::parse($booking->check_in)
                        ->diffInDays(\Carbon\Carbon::parse($booking->check_out)));
            $subtotal = $booking->price_per_night * $nights * $booking->qty;
            $paid = (float) ($booking->payments()->where('status','paid')->sum('amount'));
            $due  = max(0, $booking->total - $paid);
          @endphp

          <h5 class="mb-3">Rincian Biaya</h5>
          <div class="table-responsive">
            <table class="table align-middle">
              <tbody>
                <tr>
                  <td>Harga / Malam (avg)</td>
                  <td class="text-end">Rp{{ number_format($booking->price_per_night,0,',','.') }}</td>
                </tr>
                <tr>
                  <td>Lama Menginap</td>
                  <td class="text-end">{{ $nights }} malam</td>
                </tr>
                <tr>
                  <td>Jumlah Kamar</td>
                  <td class="text-end">{{ $booking->qty }}</td>
                </tr>
                <tr class="table-light">
                  <th>Subtotal</th>
                  <th class="text-end">Rp{{ number_format($subtotal,0,',','.') }}</th>
                </tr>
                <tr>
                  <td>Terbayar</td>
                  <td class="text-end">Rp{{ number_format($paid,0,',','.') }}</td>
                </tr>
                <tr class="table-light">
                  <th>Sisa Tagihan</th>
                  <th class="text-end">Rp{{ number_format($due,0,',','.') }}</th>
                </tr>
              </tbody>
            </table>
          </div>

          {{-- Actions --}}
          <div class="d-flex gap-2 mt-3">
            <a href="{{ route('accom.index') }}" class="btn btn-outline-secondary">Kembali ke Kamar</a>
            <button type="button" onclick="window.print()" class="btn btn-primary">Cetak / Simpan PDF</button>
          </div>
        </div>

        {{-- (Opsional) Riwayat Pembayaran --}}
        @if ($booking->payments()->exists())
          <div class="bg-white rounded shadow-sm p-4 mt-3">
            <h5 class="mb-3">Pembayaran</h5>
            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Metode</th>
                    <th>Reff</th>
                    <th class="text-end">Jumlah</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($booking->payments()->latest()->get() as $p)
                  <tr>
                    <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-capitalize">{{ $p->method }}</td>
                    <td>{{ $p->ref ?? '—' }}</td>
                    <td class="text-end">Rp{{ number_format($p->amount,0,',','.') }}</td>
                    <td>
                      <span class="badge
                        @class([
                          'bg-success' => $p->status==='paid',
                          'bg-warning text-dark' => $p->status==='pending',
                          'bg-danger'  => $p->status==='failed',
                        ])">
                        {{ ucfirst($p->status) }}
                      </span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        @endif
      </div>

      {{-- Kanan: ringkas + QR (opsional) --}}
      <div class="col-lg-4">
        <div class="p-4 rounded shadow-sm" style="background:#020c28;color:#fff;">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="small text-light">Total</div>
              <div class="h4 m-0">Rp{{ number_format($booking->total,0,',','.') }}</div>
            </div>
            <span class="badge {{ $badge['class'] }} px-3 py-2">{{ $badge['label'] }}</span>
          </div>

          <hr class="text-white-50">

          <div class="small text-light">
            <div class="mb-2"><strong>Kode:</strong> {{ $booking->code }}</div>
            <div class="mb-2"><strong>Tamu:</strong> {{ $booking->guest->name }}</div>
            <div class="mb-2"><strong>Kamar:</strong> {{ $booking->roomType->name }} ({{ $booking->qty }} kamar)</div>
            <div class="mb-2"><strong>Tanggal:</strong>
              {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}
              → {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}
            </div>
            <div class="mb-2"><strong>Malam:</strong> {{ $nights }}</div>
          </div>

          <div class="small text-light mt-3">
            *Silakan menunggu konfirmasi dari resepsionis. Untuk bantuan, hubungi kami.
          </div>
        </div>

        <div class="mt-3 p-3 border rounded">
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

{{-- Print style agar rapi saat cetak --}}
@push('styles')
    <style>
    @media print {
    header, footer, .about_banner_area, .btn, .border { display:none !important; }
    .section_gap { padding: 0 !important; }
    .shadow-sm { box-shadow: none !important; }
    .rounded { border-radius: 0 !important; }
    body { background:#fff !important; }
    }
    </style>
@endpush
@endsection
