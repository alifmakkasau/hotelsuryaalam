@extends('layouts.main')

@section('content')
<section class="breadcrumb_part bg-light py-4">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fw-bold">Booking Form</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/rooms">Rooms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="booking_form py-5">
    <div class="container">
        <div class="card shadow-lg border-0 p-4">
            <h4 class="mb-4 text-center fw-semibold">Isi Formulir Pemesanan Kamar</h4>

            <form action="#" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Check-In</label>
                        <input type="date" class="form-control" name="checkin" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Check-Out</label>
                        <input type="date" class="form-control" name="checkout" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Jumlah Tamu</label>
                        <input type="number" class="form-control" name="tamu" min="1" max="10" required>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Jenis Kamar</label>
                        <select class="form-select" name="jenis_kamar" required>
                            <option value="">-- Pilih Jenis Kamar --</option>
                            <option value="Deluxe Room">Deluxe Room</option>
                            <option value="Superior Room">Superior Room</option>
                            <option value="Suite Room">Suite Room</option>
                            <option value="Family Room">Family Room</option>
                        </select>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn px-4 py-2" style="background-color: #f8b600; font-weight:600;">
                            Submit Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
