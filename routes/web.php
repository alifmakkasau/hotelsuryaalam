<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\BookingController;

// =======================
// Halaman utama
// =======================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang
Route::get('/about', fn() => view('about'))->name('about');

// Galeri
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// =======================
// Kamar & Booking
// =======================

// Daftar kamar
Route::get('/accommodation', [AccomodationController::class, 'index'])->name('accommodation');

// Detail kamar
Route::get('/accommodation/{id}', [AccomodationController::class, 'show'])->name('accommodation.detail');

// Form Booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// Simpan Booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
