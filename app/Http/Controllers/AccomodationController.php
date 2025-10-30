<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index()
    {
        // Ambil semua data RoomType lengkap dengan relasi images dan amenities
        $rooms = RoomType::with(['images', 'amenities'])->get();

        // Kirim data ke Blade
        return view('accomodation', compact('rooms'));
    }
}
