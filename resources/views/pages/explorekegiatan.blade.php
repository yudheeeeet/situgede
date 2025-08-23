@extends('layouts.app')

@section('title', 'Event & Festival')

@push('styles')
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), 
                        radial-gradient(circle at 20% 80%, rgba(255,215,0,0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255,140,0,0.3) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(255,69,0,0.2) 0%, transparent 50%),
                        #1a1a1a;
            background-size: cover;
            background-position: center;
            min-height: 70vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,215,0,0.4)"/><circle cx="80" cy="30" r="1.5" fill="rgba(255,140,0,0.3)"/><circle cx="60" cy="70" r="2.5" fill="rgba(255,69,0,0.2)"/><circle cx="30" cy="80" r="1" fill="rgba(255,215,0,0.5)"/><circle cx="90" cy="80" r="2" fill="rgba(255,140,0,0.3)"/></svg>') repeat;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        
        .hero-subtitle {
            color: #ffd700;
            font-size: 1.3rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }
        
        .hero-date {
            color: #e0e0e0;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
        }
        
        .nav-arrows {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .nav-arrows:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            transform: translateY(-50%) scale(1.1);
        }
        
        .nav-arrows.left {
            left: 20px;
        }
        
        .nav-arrows.right {
            right: 20px;
        }
        
        .section-title {
            color: #1e40af;
            font-weight: bold;
            margin-bottom: 50px;
        }
        
        .filter-sidebar {
            background: #f8fafc;
            border-radius: 15px;
            padding: 30px;
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        
        .filter-title {
            color: #1e40af;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .month-checkbox {
            margin-bottom: 10px;
        }
        
        .month-checkbox input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }
        
        .month-checkbox label {
            color: #4a5568;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .month-checkbox:hover label {
            color: #1e40af;
        }
        
        .event-card {
            border-radius: 15px;
            overflow: hidden;
            height: 300px;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .event-card-1 { 
            background: linear-gradient(135deg, rgba(255,69,0,0.9) 0%, rgba(255,140,0,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRkY0NTAwIi8+CjxjaXJjbGUgY3g9IjEwMCIgY3k9IjEwMCIgcj0iMzAiIGZpbGw9IiNGRkQ3MDAiIG9wYWNpdHk9IjAuNyIvPgo8Y2lyY2xlIGN4PSIzMDAiIGN5PSIyMDAiIHI9IjQwIiBmaWxsPSIjRkZENzAwIiBvcGFjaXR5PSIwLjUiLz4KPC9zdmc+');
            background-size: cover; 
        }
        
        .event-card-2 { 
            background: linear-gradient(135deg, rgba(220,38,38,0.9) 0%, rgba(185,28,28,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjREMyNjI2Ii8+CjxwYXRoIGQ9Ik0xMDAsMTAwIEwxNTAsNTAgTDIwMCwxMDAgTDE1MCwxNTAgWiIgZmlsbD0iI0ZCQkYyNCIgb3BhY2l0eT0iMC43Ii8+Cjwvdmc+');
            background-size: cover; 
        }
        
        .event-card-3 { 
            background: linear-gradient(135deg, rgba(34,197,94,0.9) 0%, rgba(21,128,61,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjMjJDNTVFIi8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjMwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNGQkJGMjQiIG9wYWNpdHk9IjAuMyIvPgo8L3N2Zz4=');
            background-size: cover; 
        }
        
        .event-card-4 { 
            background: linear-gradient(135deg, rgba(59,130,246,0.9) 0%, rgba(37,99,235,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjM0I4MkY2Ii8+CjxjaXJjbGUgY3g9IjIwMCIgY3k9IjE1MCIgcj0iODAiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZCQkYyNCIgc3Ryb2tlLXdpZHRoPSI0IiBvcGFjaXR5PSIwLjciLz4KPC9zdmc+');
            background-size: cover; 
        }
        
        .event-card-5 { 
            background: linear-gradient(135deg, rgba(168,85,247,0.9) 0%, rgba(147,51,234,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjQTg1NUY3Ii8+CjxwYXRoIGQ9Ik0wLDMwMCBRMjAwLDEwMCA0MDAsMzAwIiBmaWxsPSIjRkJCRjI0IiBvcGFjaXR5PSIwLjMiLz4KPC9zdmc+');
            background-size: cover; 
        }
        
        .event-card-6 { 
            background: linear-gradient(135deg, rgba(245,158,11,0.9) 0%, rgba(217,119,6,0.8) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjU5RTBCIi8+CjxzdGFyIGN4PSIyMDAiIGN5PSIxNTAiIHI9IjUwIiBmaWxsPSIjRkZGRkZGIiBvcGFjaXR5PSIwLjQiLz4KPC9zdmc+');
            background-size: cover; 
        }
        
        .event-card .card-body {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            color: white;
            padding: 40px 20px 20px;
        }
        
        .event-card h5 {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }
        
        .event-card .date {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .event-card-link {
            position: absolute;
            inset: 0;
            z-index: 3;
        }
        
        .pagination-custom {
            margin-top: 50px;
        }
        
        .pagination-custom .page-link {
            border: none;
            color: #4a5568;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .pagination-custom .page-link:hover {
            background: #1e40af;
            color: white;
        }
        
        .pagination-custom .page-item.active .page-link {
            background: #1e40af;
            color: white;
        }
        
        .events-section {
            padding: 80px 0;
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
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .nav-arrows {
                display: none;
            }
            
            .filter-sidebar {
                position: relative;
                top: 0;
                margin-bottom: 30px;
            }
            
            .event-card {
                height: 250px;
            }
        }
    </style>
@endpush

@section('content')
<!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container text-center">
            <h1 class="hero-title">Festival Ekonomi Kreatif & Pekan HAM</h1>
            <p class="hero-subtitle"><i class="fas fa-calendar-alt me-2"></i>03 - 12 Desember 2025</p>
        </div>
        
        <button class="nav-arrows left" onclick="previousSlide()">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="nav-arrows right" onclick="nextSlide()">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>
 <!-- Events Section -->
    <section class="events-section" id="wisata">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-muted">Event & Festival</h6>
                <h2 class="section-title">SITUGEDE, BOGOR</h2>
            </div>
            
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-sidebar">
                        <h5 class="filter-title">Event Date</h5>
                        <div class="month-checkbox">
                            <input type="checkbox" id="semua" checked>
                            <label for="semua">Semua</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="januari">
                            <label for="januari">Januari</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="februari">
                            <label for="februari">Februari</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="maret">
                            <label for="maret">Maret</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="april">
                            <label for="april">April</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="mei">
                            <label for="mei">Mei</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="juni">
                            <label for="juni">Juni</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="juli">
                            <label for="juli">Juli</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="agustus">
                            <label for="agustus">Agustus</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="september">
                            <label for="september">September</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="oktober">
                            <label for="oktober">Oktober</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="november">
                            <label for="november">November</label>
                        </div>
                        <div class="month-checkbox">
                            <input type="checkbox" id="desember">
                            <label for="desember">Desember</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="row" id="eventsContainer">
                        <!-- Example dengan loop -->
                        @foreach ($events as $idx => $e)
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-{{ ($idx % 6) + 1 }}" data-month="{{ $e['month'] ?? 'desember' }}" style="position:relative;">
                                <a href="{{ route('kegiatan.detail', $e['slug']) }}" class="event-card-link" aria-label="Buka detail {{ $e['title'] }}"></a>
                                <div class="card-body">
                                    <h5>{{ $e['title'] }}</h5>
                                    <p class="date">{{ $e['date'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- xample tanpa loop -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-1" data-month="desember">
                                <div class="card-body">
                                    <h5>Festival Ekonomi Kreatif & Pekan HAM</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-2" data-month="desember">
                                <div class="card-body">
                                    <h5>"Ngubek Setu"</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-3" data-month="desember">
                                <div class="card-body">
                                    <h5>Festival Desa Wisata & Budaya Lokal</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-4" data-month="desember">
                                <div class="card-body">
                                    <h5>Lukis Alam (Melukis di Tepi Danau)</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-5" data-month="desember">
                                <div class="card-body">
                                    <h5>Yoga & Meditasi</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card event-card-6" data-month="desember">
                                <div class="card-body">
                                    <h5>Hunting Foto & Videografi</h5>
                                    <p class="date">03 - 12 Desember 2025</p>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    
                    <!-- Pagination -->
                    <nav class="pagination-custom">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" onclick="previousPage()">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">22</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" onclick="nextPage()">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
