<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;

class BookingController extends Controller
{
    // ======================
    // TAMPILKAN FORM BOOKING
    // ======================
    public function index(Request $request)
    {
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        // Default: semua tipe kamar ditampilkan
        $roomTypes = RoomType::with('images')->get();

        // Kalau user sudah pilih tanggal, filter kamar yang tersedia
        if ($checkIn && $checkOut) {
            // Ambil ID kamar yang sedang dibooking di rentang tanggal tsb
            $bookedRoomIds = \DB::table('bookings')
                ->where(function ($query) use ($checkIn, $checkOut) {
                    // logika overlap tanggal booking
                    $query->where('check_in', '<', $checkOut)
                          ->where('check_out', '>', $checkIn);
                })
                ->pluck('room_id'); // ambil hanya ID kamar

            // Ambil tipe kamar yang punya room tersedia (tidak termasuk yang sedang dibooking)
            $roomTypes = RoomType::whereHas('rooms', function ($query) use ($bookedRoomIds) {
                $query->whereNotIn('id', $bookedRoomIds);
            })
            ->with('images')
            ->get();
        }

        return view('booking', compact('roomTypes', 'checkIn', 'checkOut'));
    }

    // ======================
    // SIMPAN DATA BOOKING
    // ======================
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'room_type_id' => 'required|exists:room_types,id',
            'metode_pembayaran' => 'required|string|max:100',
            'permintaan_khusus' => 'nullable|string|max:500',
        ]);

        // Simpan data booking kalau sudah punya model Booking
        // Booking::create($validated);

        return redirect()
            ->route('booking')
            ->with('success', 'Pemesanan kamar berhasil dikirim!');
    }
}
