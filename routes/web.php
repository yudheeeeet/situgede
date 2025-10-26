<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;

Route::get('/', fn() => view('pages.index'))->name('home');
Route::get('/explore', function () {
    // Data event statis (bisa ganti dari DB)
    $events = [
        ['title' => 'Festival Ekonomi Kreatif & Pekan HAM', 'date' => '03 - 12 Desember 2025', 'slug' => 'festival-ekraf-pekan-ham', 'month' => 'desember'],
        ['title' => 'Ngubek Setu', 'date' => '03 - 12 Desember 2025', 'slug' => 'ngubek-setu', 'month' => 'desember'],
        ['title' => 'Festival Desa Wisata & Budaya Lokal', 'date' => '03 - 12 Desember 2025', 'slug' => 'festival-desa-wisata', 'month' => 'desember'],
        ['title' => 'Lukis Alam (Melukis di Tepi Danau)', 'date' => '03 - 12 Desember 2025', 'slug' => 'lukis-alam', 'month' => 'desember'],
        ['title' => 'Yoga & Meditasi', 'date' => '03 - 12 Desember 2025', 'slug' => 'yoga-meditasi', 'month' => 'desember'],
        ['title' => 'Hunting Foto & Videografi', 'date' => '03 - 12 Desember 2025', 'slug' => 'hunting-foto-videografi', 'month' => 'desember'],
    ];
    return view('pages.explorekegiatan', compact('events'));
})->name('explore');

Route::get('/kegiatan/{slug}', function (string $slug) {
    // Lookup sederhana dari array (ganti dengan DB sesuai kebutuhan)
    $events = [
        'festival-ekraf-pekan-ham' => [
            'title' => 'Festival Ekonomi Kreatif & Pekan HAM',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
        'ngubek-setu' => [
            'title' => 'Ngubek Setu',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
        'festival-desa-wisata' => [
            'title' => 'Festival Desa Wisata & Budaya Lokal',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
        'lukis-alam' => [
            'title' => 'Lukis Alam (Melukis di Tepi Danau)',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
        'yoga-meditasi' => [
            'title' => 'Yoga & Meditasi',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
        'hunting-foto-videografi' => [
            'title' => 'Hunting Foto & Videografi',
            'date' => '03 - 12 Desember 2025',
            'location' => 'Danau Situgede, Bogor',
            'price' => 'Gratis',
        ],
    ];

    abort_unless(isset($events[$slug]), 404);

    $event = $events[$slug];

    // Rekomendasi festival lain (kecuali dirinya)
    $recommended = collect($events)
        ->reject(fn($v, $k) => $k === $slug)
        ->take(2);

    return view('pages.kegiatan-detail', compact('event', 'recommended', 'slug'));
})->name('kegiatan.detail');
Route::get('/statistik', fn() => view('pages.statistik'))->name('statistik');
Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
});