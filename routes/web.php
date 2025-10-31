<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccomodationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Contact pakai controller
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Halaman daftar kamar
Route::get('/accommodation', [AccomodationController::class, 'index'])->name('accommodation');

// Halaman detail kamar
Route::get('/accommodation/{id}', [AccomodationController::class, 'show'])->name('accommodation.detail');

use App\Http\Controllers\BookingController;

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
