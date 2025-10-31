<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    // Menampilkan semua kamar
    public function index()
    {
        // Ambil semua data RoomType lengkap dengan relasi images dan amenities
        $rooms = RoomType::with(['images', 'amenities'])->get();

        // Kirim data ke Blade accomodation.blade.php
        return view('accomodation', compact('rooms'));
    }

    // Menampilkan detail kamar berdasarkan ID atau slug
    public function show($id)
    {
        // Ambil data kamar beserta relasi
        $room = RoomType::with(['images', 'amenities'])->findOrFail($id);

        // Kirim data ke Blade detail.blade.php
        return view('detail', compact('room'));
    }
}
