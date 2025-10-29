@extends('layouts.main')

@section('title', 'Accommodation - Hotel Surya Alam')

@section('content')
<!--================Accommodation Area =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Special Accommodation</h2>
            <p>Temukan berbagai pilihan kamar terbaik kami yang dirancang untuk kenyamanan Anda.</p>
        </div>

        <div class="row mb_30">
            <!-- Kamar 1 -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('template/image/room1.jpg') }}" alt="Double Deluxe Room" class="img-fluid" style="border-radius:10px;">
                        <a href="#" class="btn theme_btn button_hover mt-2">BOOK NOW</a>
                    </div>
                    <h4 class="sec_h4 mt-3">Double Deluxe Room</h4>
                    <h5>$250<span>/night</span></h5>
                </div>
            </div>

            <!-- Kamar 2 -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('template/image/room2.jpg') }}" alt="Single Deluxe Room" class="img-fluid" style="border-radius:10px;">
                        <a href="#" class="btn theme_btn button_hover mt-2">BOOK NOW</a>
                    </div>
                    <h4 class="sec_h4 mt-3">Single Deluxe Room</h4>
                    <h5>$200<span>/night</span></h5>
                </div>
            </div>

            <!-- Kamar 3 -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('template/image/room3.jpg') }}" alt="Honeymoon Suite" class="img-fluid" style="border-radius:10px;">
                        <a href="#" class="btn theme_btn button_hover mt-2">BOOK NOW</a>
                    </div>
                    <h4 class="sec_h4 mt-3">Honeymoon Suite</h4>
                    <h5>$750<span>/night</span></h5>
                </div>
            </div>

            <!-- Kamar 4 -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('template/image/room4.jpg') }}" alt="Economy Double" class="img-fluid" style="border-radius:10px;">
                        <a href="#" class="btn theme_btn button_hover mt-2">BOOK NOW</a>
                    </div>
                    <h4 class="sec_h4 mt-3">Economy Double</h4>
                    <h5>$200<span>/night</span></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Accommodation Area =================-->
@endsection
