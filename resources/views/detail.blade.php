@extends('layouts.main')

@section('title', 'Room Details - Hotel Surya Alam')

@section('content')

    <section class="about_banner_area"
        style="background: url('{{ $room->images->isNotEmpty() ? asset('storage/' . $room->images->first()->path) : asset('template/image/room1.jpg') }}') center center/cover no-repeat; height: 350px; display: flex; align-items: center; justify-content: center; color: white; position: relative;">
        <div style="background-color: rgba(0,0,0,0.45); position:absolute; top:0; left:0; width:100%; height:100%;"></div>
        <div class="container text-center position-relative" style="z-index: 2;">
            <h1 class="fw-bold display-5 animate__animated animate__fadeInDown">Room Details</h1>
            <p class="mt-2 animate__animated animate__fadeInUp">
                <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                <span class="mx-2">&#x2192;</span>
                <a href="{{ route('accommodation') }}" class="text-white text-decoration-none">Kamar</a>
                <span class="mx-2">&#x2192;</span>
                <span class="text-warning">Detail Kamar</span>
            </p>
        </div>
    </section>

    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="mb-4 animate__animated animate__fadeInLeft">
                        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
                            @if ($room->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $room->images->first()->path) }}"
                                    alt="{{ $room->name }}" class="img-fluid rounded-4 w-100 room-image">
                            @else
                                <img src="{{ asset('template/image/room1.jpg') }}" alt="Default Room"
                                    class="img-fluid rounded-4 w-100 room-image">
                            @endif
                        </div>
                    </div>

                    <div class="animate__animated animate__fadeInUp">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="fw-bold mb-0">{{ $room->name }}</h2>

                            <a href="{{ route('booking') }}" class="btn book-now-btn px-4 py-2">
                                BOOK NOW
                            </a>
                        </div>

                        <h4 style="color: #f8b600; font-weight: 700;">
                            Rp{{ number_format($room->base_price, 0, ',', '.') }} / malam
                        </h4>

                        <ul class="list-unstyled mt-3 text-muted">
                            <li><strong>Ukuran:</strong> {{ $room->size ?? '30 m²' }}</li>
                            <li><strong>Kapasitas:</strong> {{ $room->capacity ?? '2 orang' }}</li>
                            <li><strong>Tempat tidur:</strong> {{ $room->bed_type ?? '1 Double Bed' }}</li>
                            <li>
                                <strong>Fasilitas:</strong>
                                @if ($room->amenities->isNotEmpty())
                                    {{ $room->amenities->pluck('name')->implode(', ') }}
                                @else
                                    WiFi, TV, AC, Kamar mandi
                                @endif
                            </li>
                        </ul>

                        <p class="mt-3">{{ $room->description ?? 'Kamar nyaman dengan fasilitas lengkap dan suasana tenang.' }}</p>

                        </div>
                </div>

                <div class="col-lg-4 animate__animated animate__fadeInRight">
                    <div class="booking-sidebar-form p-4 border rounded-3 shadow-sm">
                        <h4 class="fw-bold mb-4 text-uppercase">Your Reservation</h4>

                        <form action="{{ route('booking') }}" method="GET">
                            <div class="mb-3">
                                <label for="check_in" class="form-label">Arrival Date</label>
                                <input type="date" class="form-control" name="check_in" id="check_in"
                                    placeholder="Arrival Date">
                            </div>
                            <div class="mb-3">
                                <label for="check_out" class="form-label">Departure Date</label>
                                <input type="date" class="form-control" name="check_out" id="check_out"
                                    placeholder="Departure Date">
                            </div>
                            <div class="mb-3">
                                <label for="adults" class="form-label">Adults</label>
                                <select class="form-select" name="adults" id="adults">
                                    <option value="">Adult</option>
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="children" class="form-label">Children</label>
                                <select class="form-select" name="children" id="children">
                                    <option value="">Child</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn book-now-btn py-2">
                                    YOUR RESERVATION
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="review_area section_gap">
        <div class="container">
            <div class="section_title text-left mb-4">
                <h4 class="title_color fw-bold">Reviews</h4>
            </div>
            <div class="review_list mb-5 animate__animated animate__fadeInUp">
                <div class="review_item p-3 border rounded shadow-sm mb-3">
                    <strong>Brandon Kelley</strong>
                    <small class="text-muted ms-2">27 Aug 2019</small>
                    <p class="mt-2 mb-1">“Pelayanan yang ramah dan kamar sangat nyaman.”</p>
                    <p style="color:#f8b600;">★★★★★</p>
                </div>
            </div>

            <div class="add_review animate__animated animate__fadeInUp animate__delay-1s">
                <h5 class="mb-3 fw-semibold">Tambahkan Review</h5>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nama Anda">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email Anda">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="4" placeholder="Tulis review Anda..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn book-now-btn mt-2 px-4 py-2">
                                Kirim Review
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <style>
        .room-image {
            transition: transform 0.6s ease, box-shadow 0.6s ease;
        }

        .room-image:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .book-now-btn {
            background-color: #f8b600;
            color: #000;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .book-now-btn:hover {
            background-color: #000;
            color: #f8b600;
            transform: scale(1.05);
        }

        /* CSS BARU UNTUK SIDEBAR */
        .booking-sidebar-form {
            background-color: #fdfdfd;
            position: sticky;
            top: 20px;
            /* Jarak dari atas saat sticky */
        }

        .booking-sidebar-form .form-label {
            font-weight: 500;
            color: #333;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection