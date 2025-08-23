@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://dinggasukapaus.github.io/code/img/beranda/hero.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 0;
            text-stroke: 2px #2c5aa0;
            -webkit-text-stroke: 2px #2c5aa0;
        }
        
        .hero-subtitle {
            color: white;
            font-size: 1.5rem;
            margin-top: 20px;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .activity-card {
            border-radius: 15px;
            overflow: hidden;
            height: 300px;
            position: relative;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .card-bg-1 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-1.png);
            background-size: cover;
            background-position: center;
        }
        .card-bg-2 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-2.png);
            background-size: cover;
            background-position: center; }
        .card-bg-3 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-3.png);
            background-size: cover;
            background-position: center; }
        .card-bg-4 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-4.png);
            background-size: cover;
            background-position: center; }
        .card-bg-5 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-5.png);
            background-size: cover;
            background-position: center; }
        .card-bg-6 { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://dinggasukapaus.github.io/code/img/beranda/galeri-6.png);
            background-size: cover;
            background-position: center; }
        
        .activity-card .card-body {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 30px 20px 20px;
        }
        
        .activity-card h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .activity-card p {
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        
        .footer {
            background: #1e40af;
            color: white;
            padding: 60px 0 20px;
        }
        
        .footer h5 {
            color: #fbbf24;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #fbbf24;
        }
        
        .social-links a {
            display: inline-block;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .section-title {
            color: #1e40af;
            font-weight: bold;
            margin-bottom: 50px;
        }
        
        .activities-section {
            padding: 80px 0;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .activity-card {
                height: 250px;
                margin-bottom: 20px;
            }
        }
    </style>
@endpush

@section('content')
<!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container text-center">
            <h1 class="hero-title">Danau<br>Situgede</h1>
            <p class="hero-subtitle">Bogor, Jawa Barat, Indonesia</p>
        </div>
    </section>
<!-- Activities Section -->
    <section class="activities-section" id="wisata">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-muted">Aktivitas dan Wisata</h6>
                <h2 class="section-title">SITUGEDE, BOGOR</h2>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-1">
                        <div class="card-body">
                            <h5>Memancing</h5>
                            <p>Nikmati Pengalaman Memancing di Danau Situgede</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-2">
                        <div class="card-body">
                            <h5>Perahu Wisata</h5>
                            <p>Berlibur Seru dengan Perahu Tradisional</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-3">
                        <div class="card-body">
                            <h5>Piknik</h5>
                            <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-4">
                        <div class="card-body">
                            <h5>Spot Selfie</h5>
                            <p>Abadikan Momen di Spot Foto Favorit</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-5">
                        <div class="card-body">
                            <h5>Kuliner & UMKM</h5>
                            <p>Cicipi Kuliner Lokal dan Produk UMKM Sekitar</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="activity-card card-bg-6">
                        <div class="card-body">
                            <h5>Trekking</h5>
                            <p>Eksplorasi Hutan & Jalur Pinggir Danau</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
