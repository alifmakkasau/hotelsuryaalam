<?php

namespace App\Http\Controllers;

use App\Models\RoomType; // tambahkan ini
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index()
    {
        // Ambil semua data RoomType lengkap dengan relasi images
        $rooms = RoomType::with('images')->get();

        // Kirim data ke Blade
        return view('accomodation', compact('rooms'));
    }
}
