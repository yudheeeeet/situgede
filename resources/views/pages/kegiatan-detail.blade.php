@extends('layouts.app')

@section('title', $event['title'] ?? 'Detail Kegiatan')

@push('styles')

<style>

    .hero-section {
    background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkyMCIgaGVpZ2h0PSI2MDAiIHZpZXdCb3g9IjAgMCAxOTIwIDYwMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjE5MjAiIGhlaWdodD0iNjAwIiBmaWxsPSIjOEQ0NjUzIi8+CjxjaXJjbGUgY3g9IjQ4MCIgY3k9IjE1MCIgcj0iMTIwIiBmaWxsPSIjQUY2Mzc5IiBvcGFjaXR5PSIwLjciLz4KPGNpcmNsZSBjeD0iMTQ0MCIgY3k9IjQ1MCIgcj0iODAiIGZpbGw9IiNBRjYzNzkiIG9wYWNpdHk9IjAuNSIvPgo8cGF0aCBkPSJNMCw0MDBMMTU3MiwzMDBMMTkyMCw1MDBMMTU3Miw2MDBMMCW2MDBaIiBmaWxsPSIjRkZEQjAwIiBvcGFjaXR5PSIwLjMiLz4KPC9zdmc+');
    background-size: cover;
    background-position: center;
    min-height: 50vh;
    display: flex;
    align-items: center;
    position: relative;
    }

    .navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    }

    .navbar-brand img {
    height: 40px;
    }

    .main-title {
    font-size: 4rem;
    font-weight: bold;
    color: #1e40af;
    margin-bottom: 30px;
    }

    .event-image {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    width: 100%;
    height: auto;
    object-fit: cover;
    }

    .event-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #4a5568;
    text-align: justify;
    }

    .event-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    transition: transform 0.3s ease;
    }

    .event-card:hover {
    transform: translateY(-5px);
    }

    .event-card h5 {
    font-weight: bold;
    margin-bottom: 15px;
    }

    .event-card .date {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    }

    .event-card .price {
    font-size: 1.2rem;
    color: #ffd700;
    }

    .festival-card {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    height: 200px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform .3s ease, box-shadow .3s ease;
    } /* [3] */

    .festival-card:hover { transform: translateY(-5px); box-shadow: 0 12px 30px rgba(0,0,0,0.15); } /* [4] */

    /* Gambar full-bleed */
    .festival-card .festival-image {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;        /* isi penuh, crop proporsional */
    object-position: center;  /* fokus tengah, bisa diubah per data */
    } /* [3] */

    /* Overlay gradasi di atas gambar */
    .festival-card .festival-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,.85) 100%);
    pointer-events: none;
    } /* [4] */

    /* Konten teks di bawah */
    .festival-card .festival-content {
    position: absolute;
    left: 0; right: 0; bottom: 0;
    padding: 16px 18px;
    color: #fff;
    } /* [4] */

    /* Aksen warna per varian (opsional) */
    .festival-card-1::before,
    .festival-card-2::before {
    content: "";
    position: absolute;
    inset: 0;
    mix-blend-mode: screen;
    pointer-events: none;
    } /* [4] */

    .festival-card-1::before { background: radial-gradient(60% 60% at 0% 0%, rgba(255,107,107,.25), transparent), radial-gradient(60% 60% at 100% 0%, rgba(238,90,36,.25), transparent); } /* [4] */
    .festival-card-2::before { background: radial-gradient(60% 60% at 0% 0%, rgba(254,202,87,.25), transparent), radial-gradient(60% 60% at 100% 0%, rgba(255,159,243,.25), transparent); } /* [4] */

        
    .festival-card .card-body {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
    padding: 20px;
    }

    .festival-card h6 {
    font-weight: bold;
    margin-bottom: 5px;
    }

    .festival-card small {
    opacity: 0.9;
    }

    .info-section {
    background: #f8fafc;
    padding: 60px 0;
    }

    .info-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    transition: all 0.3s ease;
    }

    .info-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .info-card h6 {
    color: #1e40af;
    font-weight: bold;
    margin-bottom: 15px;
    }

    .info-card .icon {
    font-size: 2.5rem;
    color: #667eea;
    margin-bottom: 20px;
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

    .btn-instagram {
    background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
    border: none;
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    text-decoration: none;
    transition: transform 0.3s ease;
    }

    .btn-instagram:hover {
    transform: scale(1.05);
    color: white;
    }

    @media (max-width: 768px) {
    .main-title {
        font-size: 2.5rem;
    }

    .hero-section {
        min-height: 40vh;
    }

    .festival-card {
        height: 150px;
    }
    }
</style>
@endpush

@section('content')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="main-title">{{ $event->judul }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-4">
                    @if($event->media)
                        <img src="{{ asset('storage/'.$event->media) }}" alt="{{ $event->judul }}" class="event-image">
                    @endif
                </div>
                <p class="event-description">{{ $event->desc }}</p>
            </div>
            <div class="col-lg-4">
                <div class="event-card">
                    <h5>Tanggal Kegiatan</h5>
                    <div class="date">{{ $event->tanggal_mulai ?? '-' }} {{ $event->tanggal_selesai ? ' - '.$event->tanggal_selesai : '' }}</div>
                    <div class="price">Harga Tiket<br><strong>{{ $event->price ?? 'Gratis' }}</strong></div>
                </div>
                <h4 class="text-primary fw-bold mb-3">Festival Lainnya</h4>
                @foreach ($recommended as $rec)
                    <a href="{{ route('explore.detail', ['id' => $rec->id]) }}" class="text-decoration-none d-block mb-3">
                    <div class="festival-card {{ $loop->iteration % 2 ? 'festival-card-1' : 'festival-card-2' }}">
                        @if($rec->media)
                            <img class="festival-image"
                                 src="{{ asset('storage/'.$rec->media) }}"
                                 alt="{{ $rec->judul }}"
                                 loading="lazy">
                        @endif
                        <div class="festival-overlay" aria-hidden="true"></div>
                        <div class="festival-content">
                            <h6 class="mb-1">{{ $rec->judul }}</h6>
                            <small>{{ $rec->tanggal_mulai ?? '-' }}</small>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="info-section">
    <div class="container">
        <h3 class="text-center text-primary fw-bold mb-5">Event Information</h3>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h6>Website Event</h6>
                    <a href="#" class="btn btn-primary btn-sm">Kunjungi Website</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h6>Event Social Media</h6>
                    <a href="#" class="btn-instagram">
                        <i class="fab fa-instagram me-2"></i>Follow Instagram
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h6>Location Address</h6>
                    <p class="mb-0">{{ $event->lokasi ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

