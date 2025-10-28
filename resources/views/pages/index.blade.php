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

  {{-- <!-- Activities Grid (opsional, bisa dihapus jika hanya mau slider) -->
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
  </section> --}}

  <!-- Activities Slider -->
  <section class="activities-section" id="wisata-slider">
    <div class="container">
      <div class="text-center mb-5">
        <h6 class="text-muted">Aktivitas dan Wisata</h6>
        <h2 class="section-title">SITUGEDE, BOGOR</h2>
      </div>

      <div id="activitiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <!-- Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#activitiesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#activitiesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="row g-4">
              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Memancing"
                   data-desc="Nikmati Pengalaman Memancing di Danau Situgede"
                   data-img="{{ asset('img/1.jpg') }}">
                  <div class="activity-card card-bg-1"
                       data-bg="{{ asset('img/1.jpg') }}">
                    <div class="card-body">
                      <h5>Memancing</h5>
                      <p>Nikmati Pengalaman Memancing di Danau Situgede</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/2.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/2.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/3.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/3.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/4.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/4.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/5.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/5.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/6.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/6.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/7.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/7.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/8.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/8.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/9.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/9.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/10.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/10.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Spot Selfie"
                   data-desc="Abadikan Momen di Spot Foto Favorit"
                   data-img="{{ asset('img/1.png') }}">
                  <div class="activity-card card-bg-4"
                       data-bg="{{ asset('img/1.png') }}">
                    <div class="card-body">
                      <h5>Spot Selfie</h5>
                      <p>Abadikan Momen di Spot Foto Favorit</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/2.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/2.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/3.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/3.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/4.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/4.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/5.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/5.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/6.jpg') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/6.jpg') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/7.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/7.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/8.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/8.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4 col-md-6">
                <a href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"
                   data-title="Piknik"
                   data-desc="Bersantai & Piknik di Bawah Rindangnya Pohon"
                   data-img="{{ asset('img/9.png') }}">
                  <div class="activity-card card-bg-3"
                       data-bg="{{ asset('img/9.png') }}">
                    <div class="card-body">
                      <h5>Piknik</h5>
                      <p>Bersantai & Piknik di Bawah Rindangnya Pohon</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
            </div>
          </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#activitiesCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#activitiesCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
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
