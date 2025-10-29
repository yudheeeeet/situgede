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

  .navbar-brand img { height: 40px; }

  .activity-card {
    border-radius: 15px;
    overflow: hidden;
    height: 300px;
    position: relative;
    transition: transform 0.3s ease;
    cursor: pointer;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  .activity-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }

  /* kelas tema tanpa URL, overlay ditambahkan saat apply */
  .card-bg-1, .card-bg-2, .card-bg-3, .card-bg-4, .card-bg-5, .card-bg-6 {}

  /* saat sudah disuntikkan --bg oleh JS */
  .activity-card.has-bg {
    background-image: var(--bg);
  }

  .activity-card .card-body {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
    padding: 30px 20px 20px;
  }

  .activity-card h5 { font-weight: bold; margin-bottom: 10px; }
  .activity-card p { font-size: 0.9rem; margin-bottom: 0; }

  .footer {
    background: #1e40af;
    color: white;
    padding: 60px 0 20px;
  }

  .footer h5 { color: #fbbf24; font-weight: bold; margin-bottom: 20px; }
  .footer a { color: #cbd5e1; text-decoration: none; transition: color 0.3s ease; }
  .footer a:hover { color: #fbbf24; }
  .social-links a { display: inline-block; margin-right: 15px; font-size: 1.2rem; }

  .section-title { color: #1e40af; font-weight: bold; margin-bottom: 50px; }
  .activities-section { padding: 80px 0; }

  @media (max-width: 768px) {
    .hero-title { font-size: 2.5rem; }
    .activity-card { height: 250px; margin-bottom: 20px; }
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
            background: linear-gradient(135deg, rgba(255, 68, 0, 0.12) 0%, rgba(255, 140, 0, 0) 100%);
            background-size: cover; 
        }
        
        .event-card-2 { 
            background: linear-gradient(135deg, rgba(220, 38, 38, 0) 0%, rgba(185, 28, 28, 0) 100%);
            background-size: cover; 
        }
        
        .event-card-3 { 
            background: linear-gradient(135deg, rgba(34, 197, 94, 0) 0%, rgba(21, 128, 60, 0) 100%);            
                        background-size: cover; 
                    }
                    
        .event-card-4 { 
            background: linear-gradient(135deg, rgba(59, 131, 246, 0) 0%, rgba(37, 100, 235, 0) 100%);            
            background-size: cover; 
        }
        
        .event-card-5 { 
            background: linear-gradient(135deg, rgba(169, 85, 247, 0) 0%, rgba(146, 51, 234, 0) 100%);            
            background-size: cover; 
        }
        
        .event-card-6 { 
            background: linear-gradient(135deg, rgba(245, 159, 11, 0) 0%, rgba(217, 119, 6, 0) 100%);            
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

  /* indikator carousel sedikit dinaikkan */
  #activitiesCarousel .carousel-indicators { margin-bottom: 0 !important; }
</style>
@endpush

@section('content')
  <!-- Hero Section -->
  <section class="hero-section" id="beranda">
    <div class="container text-center">
      <h1 class="hero-title">Danau<br> Situgede</h1>
      <p class="hero-subtitle">Bogor, Jawa Barat, Indonesia</p>
    </div>
  </section>

 <!-- Activities Grid (opsional, bisa dihapus jika hanya mau slider) -->
  <section class="activities-section" id="wisata">
    <div class="container">
      <div class="text-center mb-5">
        <h6 class="text-muted">Aktivitas dan Wisata</h6>
        <h2 class="section-title">SITUGEDE, BOGOR</h2>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-1 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/spot mancing.JPG');">
            <div class="card-body">
              <h5>Memancing</h5>
              <p>Nikmati Pengalaman Memancing di Danau Situgede</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-2 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/perahu wisata.JPG');">
            <div class="card-body">
              <h5>Perahu Wisata</h5>
              <p>Berlibur Seru dengan Perahu Tradisional</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-3 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/piknik.JPG');">
            <div class="card-body">
              <h5>Piknik</h5>
              <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-1 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/spot foto.JPG');">
            <div class="card-body">
              <h5>Spot foto</h5>
              <p>Spot foto Danau Situgede</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-2 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/tempat melukis.JPG');">
            <div class="card-body">
              <h5>Tempat melukis</h5>
              <p>terdapat media lukis</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-3 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/taman.JPG');">
            <div class="card-body">
              <h5>Taman</h5>
              <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-1 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/tempat yoga.JPG');">
            <div class="card-body">
              <h5>Tempat yoga</h5>
              <p>area untuk yoga</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="activity-card card-bg-2 has-bg"
               style="--bg: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/assets/img/galeri/tracking track.JPG');">
            <div class="card-body">
              <h5>Tracking track</h5>
              <p>track untuk menyusuri lokasi lokasi</p>
            </div>
          </div>
        </div>

        


      </div>
    </div>
  </section>

  <!-- Activities Slider -->
  <section class="activities-section" id="wisata-slider">
    <div class="container">
      <div class="text-center mb-5">
        <h6 class="text-muted">Aktivitas dan Wisata</h6>
        <h2 class="section-title">SITUGEDE, BOGOR</h2>
      </div>

      <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="row" id="eventsContainer">
                    @forelse ($events as $idx => $e)
                    <div class="col-lg-4 col-md-6">
                        <div class="event-card event-card-{{ ($idx % 6) + 1 }}" style="position:relative;">
                            
                            <a href="{{ route('explore.detail', ['id' => $e->id]) }}" class="event-card-link" aria-label="Buka detail {{ $e->judul }}"></a>

                            @if($e->media)
                                <img src="{{ asset('storage/' . $e->media) }}" alt="{{ $e->judul }}" style="width:100%;height:180px;object-fit:cover;border-radius:12px 12px 0 0;">
                            @endif
                            <div class="card-body">
                                <h5>{{ $e->judul }}</h5>
                                <p class="date">{!! Str::limit($e->desc, 60) !!}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center">Belum ada event.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <nav class="pagination-custom mt-4">
                    {{ $events->links() }}
                </nav>
            </div>
        </div>
    </div>

  </section>

  <!-- Preview Modal -->
  <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content bg-dark">
        <div class="modal-header border-0">
          <h5 class="modal-title text-white" id="previewTitle"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <img id="previewImage" class="w-100 d-block" alt="preview">
        </div>
        <div class="modal-footer border-0">
          <p class="text-white-50 mb-0" id="previewDesc"></p>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  // fungsi menyuntikkan background hanya saat diperlukan
  function applyBgFor(container){
    container.querySelectorAll('.activity-card:not(.has-bg)').forEach(card=>{
      const url = card.getAttribute('data-bg');
      if(!url) return;
      card.style.setProperty('--bg',
        `linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("${url}")`);
      card.classList.add('has-bg');
    });
  }

  // inisialisasi untuk slide pertama (active)
  document.addEventListener('DOMContentLoaded', ()=>{
    const active = document.querySelector('#activitiesCarousel .carousel-item.active');
    if(active) applyBgFor(active);
  });

  // saat carousel akan berpindah slide, siapkan background slide berikutnya
  const carouselEl = document.getElementById('activitiesCarousel');
  if (carouselEl) {
    carouselEl.addEventListener('slide.bs.carousel', (e)=>{
      const next = e.relatedTarget;
      if(next) applyBgFor(next);
    });
  }

  // logic modal preview
  const previewModal = document.getElementById('previewModal');
  previewModal.addEventListener('show.bs.modal', function (event) {
    const trigger = event.relatedTarget;
    if(!trigger) return;
    const title = trigger.getAttribute('data-title');
    const desc  = trigger.getAttribute('data-desc');
    const img   = trigger.getAttribute('data-img');

    document.getElementById('previewTitle').textContent = title || '';
    document.getElementById('previewDesc').textContent  = desc || '';
    const imgEl = document.getElementById('previewImage');
    imgEl.src = img || '';
    imgEl.alt = title || 'preview';
  });
</script>
@endpush
