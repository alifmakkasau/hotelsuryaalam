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

// Tentang Kami
Route::get('/about', fn() => view('about'))->name('about');

// Galeri
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// =======================
// Kamar & Booking
// =======================

// Daftar kamar
Route::get('/accommodation', [AccomodationController::class, 'index'])->name('accom.index');

// Detail kamar (slug atau id — mendukung dua-duanya)
Route::get('/accommodation/{roomType:slug?}', [AccomodationController::class, 'show'])->name('accom.show');
Route::get('/accommodation/id/{id}', [AccomodationController::class, 'show'])->name('accommodation.detail');

// Booking Form (frontend)
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// Simpan Booking (frontend)
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Detail Booking berdasarkan kode
Route::get('/booking/{code}', [BookingController::class, 'show'])->name('booking.show');
