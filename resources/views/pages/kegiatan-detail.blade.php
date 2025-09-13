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

@section('content')
<!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container">
        </div>
    </section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="main-title">{{ $event['title'] }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="mb-4">
                    <img src="{{ asset('/assets/img/Beranda -  Festival Ekonomi Kreatif & Pekan HAM.png') }}" alt="{{ $event['title'] }}" class="event-image">
                </div>

                <p class="event-description">
                    Ngubek Setu di Danau Situgede adalah tradisi unik di mana warga dan wisatawan bersama-sama menangkap ikan langsung dari danau menggunakan alat sederhana. Tradisi ini tidak hanya menjadi hiburan rakyat, tetapi juga menjadi simbol kebersamaan, gotong royong, dan cinta lingkungan.
                </p>

                <p class="event-description">
                    Acara ini menggabungkan kearifan lokal dengan pariwisata berkelanjutan, memberikan pengalaman autentik kepada pengunjung untuk merasakan kehidupan tradisional masyarakat sekitar danau. Selain menangkap ikan, acara ini juga dimeriahkan dengan pertunjukan seni budaya lokal dan pameran produk UMKM.
                </p>
            </div>

            <div class="col-lg-4">
                <div class="event-card">
                    <h5>Jenis Wisata</h5>
                    <h6>Jenis Wisata</h6>

                    <div class="date d-none">{{ $event['date'] }}</div>
                    <div class="price">Harga Tiket<br><strong>{{ $event['price'] }}</strong></div>
                </div>

                <h4 class="text-primary fw-bold mb-3">Festival Lainnya</h4>

                @foreach ($recommended as $slugRec => $rec)
                <a href="{{ route('kegiatan.detail', $slugRec) }}" class="text-decoration-none d-block mb-3">
                    <div class="festival-card {{ $loop->iteration % 2 ? 'festival-card-1' : 'festival-card-2' }}">
                    
                    {{-- Gambar full-bleed dari backend --}}
                    @php
                        $img = $rec['image_url'] ?? $rec['image_path'] ?? null;
                        if ($img && !Str::startsWith($img, ['http://','https://','/'])) {
                            $img = Storage::url($img);
                        }
                    @endphp
                    <img class="festival-image"
                        src="{{ $img ?? asset('/assets/img/Beranda -  Festival Ekonomi Kreatif & Pekan HAM.png') }}"
                        alt="{{ $rec['title'] }}"
                        loading="lazy">

                    {{-- Overlay gradasi --}}
                    <div class="festival-overlay" aria-hidden="true"></div>

                    {{-- Konten teks --}}
                    <div class="festival-content">
                        <h6 class="mb-1">{{ $rec['title'] }}</h6>
                        <small>{{ $rec['date'] }}</small>
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
                    <p class="mb-0">{{ $event['location'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



<!-- Main Content -->
    <!-- xample -->
    <!-- <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">Ngubek Setu</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAwIiBoZWlnaHQ9IjQwMCIgdmlld0JveD0iMCAwIDYwMCA0MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIiBmaWxsPSIjRkZEQjAwIi8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEwMCIgcj0iNDAiIGZpbGw9IiNGRjY5NDciLz4KPGNpcmNsZSBjeD0iMzAwIiBjeT0iMTUwIiByPSI1MCIgZmlsbD0iI0VFNUEyNCIvPgo8Y2lyY2xlIGN4PSI0NTAiIGN5PSIxMjAiIHI9IjM1IiBmaWxsPSIjRkY2OTQ3Ii8+CjxyZWN0IHg9IjUwIiB5PSIyNTAiIHdpZHRoPSI1MDAiIGhlaWdodD0iMTAwIiBmaWxsPSIjNDFCODgzIiBvcGFjaXR5PSIwLjciLz4KPHN2ZyB4PSIyMDAiIHk9IjIwMCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiPgo8cGF0aCBkPSJNMTAsNTAgTDUwLDEwIEw5MCw1MCBMNTAsOTAgWiIgZmlsbD0iI0ZGNjk0NyIvPgo8cGF0aCBkPSJNMTEwLDUwIEwxNTAsMTAgTDE5MCw1MCBMMTU0LDkwIFoiIGZpbGw9IiNFRTVBMjQiLz4KPC9zdmc+Cjx0ZXh0IHg9IjMwMCIgeT0iMzgwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjAiIGZpbGw9IiMzNzNBM0MiPk5ndWJlayBTZXR1IFRyYWRpdGlvbmFsIENlcmVtb255PC90ZXh0Pgo8L3N2Zz4=" alt="Ngubek Setu Traditional Dance" class="event-image">
                    </div>
                    
                    <p class="event-description">
                        Ngubek Setu di Danau Situgede adalah tradisi unik di mana warga dan wisatawan bersama-sama menangkap ikan langsung dari danau menggunakan alat sederhana. Tradisi ini tidak hanya menjadi hiburan rakyat, tetapi juga menjadi simbol kebersamaan, gotong royong, dan cinta lingkungan.
                    </p>
                    
                    <p class="event-description">
                        Acara ini menggabungkan kearifan lokal dengan pariwisata berkelanjutan, memberikan pengalaman autentik kepada pengunjung untuk merasakan kehidupan tradisional masyarakat sekitar danau. Selain menangkap ikan, acara ini juga dimeriahkan dengan pertunjukan seni budaya lokal dan pameran produk UMKM.
                    </p>
                </div>
                
                <div class="col-lg-4">
                    <div class="event-card">
                        <h5>Tanggal Kegiatan</h5>
                        <div class="date">03 - 12 Desember 2025</div>
                        <div class="price">Harga Tiket<br><strong>Gratis</strong></div>
                    </div>
                    
                    <h4 class="text-primary fw-bold mb-3">Festival Lainnya</h4>
                    
                    <div class="festival-card festival-card-1">
                        <div class="card-body">
                            <h6>Festival Desa Wisata & Budaya Lokal</h6>
                            <small>03 - 12 Desember 2025</small>
                        </div>
                    </div>
                    
                    <div class="festival-card festival-card-2">
                        <div class="card-body">
                            <h6>Hunting Foto & Videografi</h6>
                            <small>05 - 15 Desember 2025</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Event Information Section -->
    <!-- xample -->
    <!-- <section class="info-section">
        <div class="container">
            <h3 class="text-center text-primary fw-bold mb-5">Event Information</h3>
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="info-card">
                        <div class="icon">
                            <i class="fas fa-globe-asia"></i>
                        </div>
                        <h6>Website Event</h6>
                        <a href="https://spendingtuhan.tubankab.go.id/" class="btn btn-primary btn-sm">
                            Kunjungi Website
                        </a>
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
                        <p class="mb-0">Tuban Regency, East Java</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endsection

