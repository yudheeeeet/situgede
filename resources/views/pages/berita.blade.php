@extends('layouts.app')

@section('title', 'Berita')

@push('styles')
    <style>
        :root {
            --color-primary: #1e40af;
            --color-secondary: #fbbf24;
            --color-text: #1f2937;
            --color-text-light: #6b7280;
            --color-surface: #ffffff;
            --color-background: #f9fafb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Inter', 'Roboto', sans-serif;
            color: var(--color-text);
            background-color: var(--color-background);
            line-height: 1.6;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--color-primary) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 1.6rem;
            color: var(--color-secondary);
        }

        .navbar-nav .nav-link {
            color: var(--color-text);
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--color-primary);
            background-color: rgba(30, 64, 175, 0.08);
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)),
                        url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1600') center/cover;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
            margin-top: 76px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(30, 64, 175, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(251, 191, 36, 0.2) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 2rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.6;
        }

        /* News Section */
        .news-section {
            padding: 80px 0;
            background-color: var(--color-background);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-subtitle {
            color: var(--color-text-light);
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .section-title {
            color: var(--color-primary);
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
        }

        /* Swiper Container */
        .news-swiper {
            padding-bottom: 60px;
            overflow: visible;
        }

        .swiper-slide {
            height: auto;
        }

        /* News Cards */
        .news-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .news-card-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .news-card:hover .news-card-image {
            transform: scale(1.05);
        }

        .news-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-card-date {
            color: var(--color-text-light);
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-card-date i {
            color: var(--color-secondary);
        }

        .news-card-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 0.75rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-card-excerpt {
            color: var(--color-text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-card-link {
            color: var(--color-primary);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .news-card-link:hover {
            color: #1e3a8a;
            gap: 0.75rem;
        }

        .news-card-link i {
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-card-link i {
            transform: translateX(4px);
        }

        /* Swiper Navigation */
        .swiper-button-next,
        .swiper-button-prev {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px;
            color: var(--color-primary);
            font-weight: bold;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: var(--color-primary);
            transform: scale(1.1);
        }

        .swiper-button-next:hover:after,
        .swiper-button-prev:hover:after {
            color: white;
        }

        .swiper-button-disabled {
            opacity: 0.5;
        }

        /* Swiper Pagination */
        .swiper-pagination {
            bottom: 20px !important;
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: var(--color-text-light);
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: var(--color-primary);
            opacity: 1;
            width: 30px;
            border-radius: 6px;
        }

        /* View All Button */
        .pagination-wrapper {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        .btn-view-all {
            background-color: var(--color-primary);
            color: white;
            padding: 12px 32px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
        }

        .btn-view-all:hover {
            background-color: #1e3a8a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
        }

        /* Footer */
        .footer {
            background-color: var(--color-primary);
            color: white;
            padding: 60px 0 20px;
        }

        .footer h5 {
            color: var(--color-secondary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--color-secondary);
            transform: translateX(4px);
        }

        /* .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        } */

        /* .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--color-secondary);
            color: var(--color-primary);
            transform: translateY(-3px);
        } */

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 3rem;
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-logo {
            max-width: 150px;
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 50vh;
                margin-top: 56px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .news-section {
                padding: 50px 0;
            }

            .section-header {
                margin-bottom: 40px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 40px;
                height: 40px;
            }

            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 16px;
            }

            .footer {
                padding: 40px 0 20px;
            }

            .footer .col-md-4 {
                margin-bottom: 2rem;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }
    </style>
@endpush

@section('content')
<section class="hero-section" id="beranda">
    <div class="hero-content">
        <h1 class="hero-title">Jelajahi Keindahan dan Ketentraman di Danau Situgede</h1>
        <p class="hero-subtitle">
            Nikmati pesona alam pegunungan Bogor yang memukau dengan air danau yang jernih, 
            udara segar, dan berbagai aktivitas menarik yang siap memberikan pengalaman tak terlupakan
        </p>
    </div>
</section>

<section class="news-section" id="berita">
    <div class="container">
        <div class="section-header">
            <h6 class="section-subtitle">Berita & Informasi</h6>
            <h2 class="section-title">Berita Situgede</h2>
        </div>
        <div class="swiper news-swiper" style="padding-bottom: 100px;padding-top: 100px;">
            <div class="swiper-wrapper">
                @foreach($news as $item)
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="{{ $item->media ? asset('storage/'.$item->media) : 'https://via.placeholder.com/800x220?text=No+Image' }}"
                             alt="{{ $item->judul }}" class="news-card-image">
                        <div class="news-card-body">
                            <div class="news-card-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('F d, Y') }}
                            </div>
                            <h5 class="news-card-title">{{ $item->judul }}</h5>
                            <p class="news-card-excerpt">{{ \Illuminate\Support\Str::limit($item->desc, 120, '...') }}</p>
                            @if($item->link)
                            <a href="{{ $item->link }}" class="news-card-link" target="_blank" rel="noopener">
                                Lihat Selengkapnya
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next d-none"></div>
            <div class="swiper-button-prev d-none"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="pagination-wrapper">
            {{ $news->links() }}
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- Swiper JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper
    const swiper = new Swiper('.news-swiper', {
        // Slides per view based on screen size
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // Mobile
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // Tablet
            768: {
                slidesPerView: 2,
                spaceBetween: 25
            },
            // Desktop
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    });
</script>
@endpush
