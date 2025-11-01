@extends('layouts.main')

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
        <h1 style="font-weight: bold; font-size: 42px;">Kontak</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            <a href="{{ url('/') }}" style="color: #fff; text-decoration: none;">Home</a>
            <span style="margin: 0 8px;">&#x2192;</span>
            Kontak
        </p>
    </div>
</section>

<section class="contact_area section_gap" style="padding-top: 100px; padding-bottom: 60px;">
    <div class="container">
        <!-- Judul Halaman -->
        <div class="section_title text-center mb-5">
            <h2 class="title_color" style="color: #000;">Hubungi Kami</h2>
            <p style="max-width: 700px; margin: 0 auto; text-align: justify;">
                Kami senang dapat membantu Anda! Jangan ragu untuk menghubungi kami melalui informasi di bawah ini
                atau kirimkan pesan langsung menggunakan formulir kontak.
            </p>
        </div>

        <!-- Informasi Kontak -->
        <div class="row mb-5">
            <div class="col-md-6">
                <h4 style="color:#000;">Alamat Hotel Surya Alam</h4>
                <p style="font-size:16px; line-height:1.6;">
                    Jl. Trans Kalimantan No.1, Sul Ambawang Kuala,<br>
                    Kec. Sungai Ambawang, Kabupaten Kubu Raya,<br>
                    Kalimantan Barat 78393<br><br>
                    <strong>Nomor Telepon:</strong>
                    <a href="https://wa.me/6285348404764" target="_blank" 
                       style="color:#25D366; text-decoration:none; font-weight:500;">
                        <i class="fa fa-whatsapp" style="margin-right:8px;"></i>0853-4840-4764
                    </a>
                </p>
            </div>

            <div class="col-md-6">
                <h4 style="color:#000;">Lokasi Kami</h4>
                <div style="width:100%; height:300px; border-radius:10px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.2);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817430245018!2d109.41083117501212!3d-0.03827189996134787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d57089995d2ab%3A0x58d1085fdf3da3fc!2sHOTEL%20%26%20RESTORAN%20SURYA%20ALAM!5e0!3m2!1sen!2sid!4v1761668654158!5m2!1sen!2sid" 
                        width="100%" height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Form Kontak -->
        <div class="contact_form_area">
            <h4 class="mb-4" style="color:#000;">Kirim Pesan</h4>
            <form class="row contact_form" action="#" method="post" id="contactForm">
                @csrf
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email Anda" required>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon" required>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek Pesan">
                </div>
                <div class="col-md-12 form-group">
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Masukkan Pesan Anda" required></textarea>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn btn-primary"
                        style="background-color:#0b1f3a; border:none; border-radius:5px; padding:10px 25px;">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Styling tambahan -->
<style>
    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #0b1f3a;
        box-shadow: 0 0 5px rgba(11, 31, 58, 0.3);
    }
    textarea.form-control { resize: none; }
    .btn:hover { background-color: #1b3f6b !important; }
</style>
@endsection
