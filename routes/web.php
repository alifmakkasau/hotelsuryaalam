<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Tambahkan route baru untuk halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

