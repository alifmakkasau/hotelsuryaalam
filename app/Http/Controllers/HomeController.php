<?php

namespace App\Http\Controllers;

use App\Models\RoomType; // tambahkan ini
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data room beserta relasi gambar (images)
        $roomTypes = RoomType::with('images')->get();

        // Kirim data ke view home.blade.php
        return view('home', compact('roomTypes'));
    }
}
