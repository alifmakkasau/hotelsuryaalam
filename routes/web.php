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

Route::get('/accommodation', [AccomodationController::class, 'index'])->name('accommodation');
