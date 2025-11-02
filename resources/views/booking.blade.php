@extends('layouts.main')

@section('content')
<section class="booking_form py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-3">Pesan Kamar</h2>
        <p class="text-center mb-5">Lengkapi formulir di bawah untuk melakukan pemesanan kamar</p>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Error validasi --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            {{-- Informasi Tamu --}}
            <div class="card mb-4 p-4 shadow-sm">
                <h5 class="mb-3">Informasi Tamu</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nomor Telepon *</label>
                        <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>
            </div>

            {{-- Detail Pemesanan --}}
            <div class="card mb-4 p-4 shadow-sm">
                <h5 class="mb-3">Detail Pemesanan</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Check-In *</label>
                        <input type="date" name="check_in" id="check_in" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Check-Out *</label>
                        <input type="date" name="check_out" id="check_out" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Dewasa *</label>
                        <input type="number" name="adults" class="form-control" min="1" value="1" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Anak</label>
                        <input type="number" name="children" class="form-control" min="0" value="0">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Jumlah Kamar *</label>
                        <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control" min="1" value="1" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label">Tipe Kamar *</label>
                        <select name="jenis_kamar" id="jenis_kamar" class="form-select" required>
                            <option value="">-- Pilih Tipe Kamar --</option>
                            @foreach($roomTypes as $type)
                                <option value="{{ $type->id }}" data-price="{{ $type->base_price }}">
                                    {{ $type->name }} - Rp {{ number_format($type->base_price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Preview Gambar Kamar --}}
                <div class="mt-3">
                    @foreach($roomTypes as $type)
                        <div class="card mb-2 room-preview" id="room-{{ $type->id }}" style="display:none;">
                            @if($type->images && $type->images->first())
                                <img src="{{ asset('storage/' . $type->images->first()->path) }}" class="img-fluid rounded" alt="{{ $type->name }}">
                            @else
                                <img src="{{ asset('template/image/room1.jpg') }}" class="img-fluid rounded" alt="{{ $type->name }}">
                            @endif
                            <div class="p-2">
                                <strong>{{ $type->name }}</strong><br>
                                Rp {{ number_format($type->base_price, 0, ',', '.') }} / malam
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Informasi Pembayaran --}}
            <div class="card mb-4 p-4 shadow-sm">
                <h5 class="mb-3">Informasi Pembayaran</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Metode Pembayaran *</label>
                        <select name="metode" class="form-select" required>
                            <option value="cash">Bayar di Tempat (Cash)</option>
                            <option value="transfer">Transfer Bank</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Total Pembayaran</label>
                        <input type="text" id="totalPembayaran" class="form-control" readonly>
                    </div>
                </div>
            </div>

            {{-- Permintaan Khusus --}}
            <div class="card mb-4 p-4 shadow-sm">
                <h5 class="mb-3">Permintaan Khusus</h5>
                <textarea name="permintaan" class="form-control" rows="3" placeholder="Contoh: Kamar lantai atas, extra bed, dll."></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning px-5 py-2 fw-semibold">Pesan Sekarang</button>
            </div>
        </form>
    </div>
</section>

{{-- Script: Hitung total otomatis dan preview gambar --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectRoom = document.getElementById('jenis_kamar');
    const checkInInput = document.getElementById('check_in');
    const checkOutInput = document.getElementById('check_out');
    const jumlahKamarInput = document.getElementById('jumlah_kamar');
    const totalInput = document.getElementById('totalPembayaran');

    // Hitung lama menginap (malam)
    function getNights() {
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        const diffTime = checkOut - checkIn;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return diffDays > 0 ? diffDays : 0;
    }

    // Update total harga dan preview gambar
    function updateTotal() {
        const selected = selectRoom.options[selectRoom.selectedIndex];
        const price = parseFloat(selected?.dataset.price || 0);
        const nights = getNights();
        const jumlahKamar = parseInt(jumlahKamarInput.value) || 1;

        let total = 0;
        if (price && nights > 0 && jumlahKamar > 0) {
            total = price * nights * jumlahKamar;
            totalInput.value = `Rp ${total.toLocaleString('id-ID')} (${jumlahKamar} kamar × ${nights} malam)`;
        } else if (price) {
            totalInput.value = `Rp ${price.toLocaleString('id-ID')} / malam`;
        } else {
            totalInput.value = '';
        }

        // Tampilkan gambar kamar hanya kalau tanggal sudah diisi
        document.querySelectorAll('.room-preview').forEach(el => el.style.display = 'none');
        if (selected.value && checkInInput.value && checkOutInput.value) {
            const preview = document.getElementById('room-' + selected.value);
            if (preview) preview.style.display = 'block';
        }
    }

    [selectRoom, checkInInput, checkOutInput, jumlahKamarInput].forEach(el => {
        el.addEventListener('change', updateTotal);
        el.addEventListener('input', updateTotal);
    });

    window.addEventListener('load', updateTotal);
});
</script>
@endsection
