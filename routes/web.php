<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;

Route::get('/', fn() => view('pages.index'))->name('dashboard');

// route fe
Route::get('/explore', [EventController::class, 'explore'])->name('explore');
// detail kegiatan dengan slug dinamis (pastikan ada field slug unik di tabel events)
// Route::get('/explorekegiatan/{slug}', [EventController::class, 'exploreDetail'])->name('events.detail');
// Route::get('/explorekegiatan/{id}', [EventController::class, 'exploreDetail'])->name('events.detail');
Route::get('/explorekegiatan/{id}', [EventController::class, 'exploreDetail'])->name('events.detail');
Route::get('/statistik', fn() => view('pages.statistik'))->name('statistik');
Route::get('/berita', [DashboardController::class, 'berita'])->name('berita');

// route admin
Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
});