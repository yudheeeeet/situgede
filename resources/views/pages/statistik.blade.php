@extends('layouts.app')

@section('title', 'Statistik & Fakta')
@push('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4a90e2;
            --secondary-blue: #357abd;
            --accent-teal: #5bc5c7;
            --light-blue: #e3f2fd;
            --text-dark: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-blue) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-blue) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 120px 0 80px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="60" cy="70" r="2.5" fill="rgba(255,255,255,0.12)"/></svg>') repeat;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .stats-section {
            background: var(--light-blue);
            padding: 80px 0;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .visitor-chart {
            height: 300px;
            background: linear-gradient(45deg, var(--accent-teal), #4ecdc4);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            position: relative;
            overflow: hidden;
        }

        .visitor-chart::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><path d="M0,10 Q25,0 50,10 T100,10" stroke="rgba(255,255,255,0.3)" stroke-width="2" fill="none"/></svg>') repeat-x;
        }

        .event-stats {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .progress-item {
            margin-bottom: 25px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
        }

        .progress-bar {
            border-radius: 5px;
            transition: width 0.6s ease;
        }

        .features-section {
            padding: 80px 0;
            background: white;
        }

        .feature-card {
            text-align: center;
            padding: 40px 20px;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--primary-blue);
        }

        .footer {
            background: var(--text-dark);
            color: white;
            padding: 60px 0 20px;
        }

        .footer h5 {
            color: var(--accent-teal);
            margin-bottom: 20px;
        }

        .footer a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent-teal);
        }

        .btn-primary {
            background: var(--primary-blue);
            border: none;
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }

        @media (max-width: 768px) {
            .stat-number {
                font-size: 2.5rem;
            }
            
            .hero-section {
                padding: 100px 0 60px;
            }
        }
    </style>
@endpush
@section('content')
<!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 hero-content" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Danau Situgede dalam Angka</h1>
                    <p class="lead mb-4">Destinasi wisata unggulan Bogor dengan pesona alam yang memukau dan berbagai fasilitas modern untuk kenyamanan pengunjung.</p>
                    <div class="d-flex gap-3">
                        <a href="#statistik" class="btn btn-primary btn-lg">
                            <i class="fas fa-chart-line me-2"></i>Lihat Statistik
                        </a>
                        <a href="#wisata" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-map-marker-alt me-2"></i>Jelajahi Wisata
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section with Charts -->
<section class="stats-section" id="statistik">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Danau Situgede dalam Angka</h2>
            <p class="lead text-muted">Data dan statistik terkini tentang wisata Danau Situgede</p>
        </div>

        <!-- Main Statistics Cards -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-number" data-target="53">0</div>
                    <div class="stat-label">Total Pengunjung</div>
                    <small class="text-muted">Per Hari (Rata-rata)</small>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-number" data-target="17">0</div>
                    <div class="stat-label">Komunitas Terlibat</div>
                    <small class="text-muted">Komunitas Aktif</small>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-number" data-target="2.5">0</div>
                    <div class="stat-label">Juta Rupiah</div>
                    <small class="text-muted">Pendapatan Harian</small>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <div class="stat-number" data-target="120">0</div>
                    <div class="stat-label">Event & Festival</div>
                    <small class="text-muted">Per Tahun</small>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Visitor Trend Chart -->
            <div class="col-lg-8 mb-4" data-aos="fade-right">
                <div class="chart-container">
                    <h4 class="mb-4">
                        <i class="fas fa-chart-line text-primary me-2"></i>
                        Rata-rata Pengunjung (2018-2025)
                    </h4>
                    <canvas id="visitorChart" height="100"></canvas>
                </div>
            </div>
            
            <!-- UMKM Statistics -->
            <div class="col-lg-4 mb-4" data-aos="fade-left">
                <div class="event-stats">
                    <h4 class="mb-4">
                        <i class="fas fa-store text-success me-2"></i>
                        Statistik UMKM Sekitar Danau
                    </h4>
                    <canvas id="umkmChart" height="200"></canvas>
                    
                    <div class="mt-4">
                        <h6><i class="fas fa-calendar-check text-warning me-2"></i>Event & Sosial</h6>
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
                            <span><i class="fas fa-users text-primary me-2"></i>Participasi Komunitas:</span>
                            <strong class="text-primary">17 komunitas</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                            <span><i class="fas fa-money-bill-wave text-success me-2"></i>Pendapatan Selfie Spot:</span>
                            <strong class="text-success">Rp 2,5 juta/hari</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics Row -->
        <div class="row mt-4">
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="chart-container">
                    <h5 class="mb-4">
                        <i class="fas fa-chart-pie text-info me-2"></i>
                        Distribusi Event Tahunan
                    </h5>
                    <canvas id="eventChart" height="150"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="chart-container">
                    <h5 class="mb-4">
                        <i class="fas fa-chart-bar text-warning me-2"></i>
                        Perbandingan Tahunan (2018-2025)
                    </h5>
                    <canvas id="comparisonChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Features Section -->
    <section class="features-section" id="fasilitas">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Fasilitas & Aktivitas</h2>
                <p class="lead text-muted">Nikmati berbagai fasilitas dan aktivitas menarik di Danau Situgede</p>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h5>Spot Fotografi</h5>
                        <p class="text-muted">Area selfie dan fotografi dengan pemandangan danau yang menawan</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h5>Kuliner Lokal</h5>
                        <p class="text-muted">Warung dan resto dengan menu khas Bogor di sekitar danau</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h5>Event Regular</h5>
                        <p class="text-muted">Festival dan event rutin sepanjang tahun untuk pengunjung</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h5>Wisata Alam</h5>
                        <p class="text-muted">Nikmati keindahan alam dan udara segar di sekitar danau</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
// Initialize AOS (Animate On Scroll)
AOS.init({
    duration: 1000,
    once: true
});

// Chart.js Configuration
Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
Chart.defaults.color = '#2c3e50';

// Main Visitor Trend Chart
const visitorCtx = document.getElementById('visitorChart').getContext('2d');
const visitorChart = new Chart(visitorCtx, {
    type: 'line',
    data: {
        labels: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'],
        datasets: [{
            label: 'Pengunjung (dalam ribuan)',
            data: [18, 21, 10, 15, 28, 25, 21, 19],
            borderColor: '#5bc5c7',
            backgroundColor: 'rgba(91, 197, 199, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#5bc5c7',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    font: {
                        size: 12,
                        weight: 'bold'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(44, 62, 80, 0.9)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                cornerRadius: 8,
                displayColors: false,
                callbacks: {
                    label: function(context) {
                        return `${context.parsed.y}k pengunjung`;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.1)'
                },
                ticks: {
                    callback: function(value) {
                        return value + 'k';
                    }
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// UMKM Doughnut Chart
const umkmCtx = document.getElementById('umkmChart').getContext('2d');
const umkmChart = new Chart(umkmCtx, {
    type: 'doughnut',
    data: {
        labels: ['Toilet', 'Warung', 'Tempat Parkir'],
        datasets: [{
            data: [53, 60, 75],
            backgroundColor: [
                '#4a90e2',
                '#5bc5c7',
                '#fbbf24'
            ],
            borderWidth: 2,
            borderColor: '#ffffff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true,
                    font: {
                        size: 11
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(44, 62, 80, 0.9)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                cornerRadius: 8,
                callbacks: {
                    label: function(context) {
                        return `${context.label}: ${context.parsed}%`;
                    }
                }
            }
        }
    }
});

// Event Distribution Chart
const eventCtx = document.getElementById('eventChart').getContext('2d');
const eventChart = new Chart(eventCtx, {
    type: 'pie',
    data: {
        labels: ['Festival Situgede', 'Lomba Memancing', 'Event Tahunan', 'Ngubek Setu', 'Festival Lainnya'],
        datasets: [{
            data: [120, 96, 48, 24, 2],
            backgroundColor: [
                '#4a90e2',
                '#5bc5c7',
                '#fbbf24',
                '#e74c3c',
                '#9b59b6'
            ],
            borderWidth: 2,
            borderColor: '#ffffff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 15,
                    usePointStyle: true,
                    font: {
                        size: 10
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(44, 62, 80, 0.9)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                cornerRadius: 8
            }
        }
    }
});

// Comparison Bar Chart
const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
const comparisonChart = new Chart(comparisonCtx, {
    type: 'bar',
    data: {
        labels: ['2019', '2020', '2021', '2022', '2023', '2024', '2025'],
        datasets: [{
            label: 'Pengunjung',
            data: [21, 10, 15, 28, 25, 21, 19],
            backgroundColor: '#4a90e2',
            borderRadius: 4
        }, {
            label: 'Event',
            data: [15, 8, 12, 20, 18, 16, 14],
            backgroundColor: '#5bc5c7',
            borderRadius: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    usePointStyle: true,
                    font: {
                        size: 11,
                        weight: 'bold'
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Counter Animation Function
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            if (target === 2.5) {
                element.textContent = '2.5';
            } else {
                element.textContent = Math.floor(target);
            }
            clearInterval(timer);
        } else {
            if (target === 2.5) {
                element.textContent = (current).toFixed(1);
            } else {
                element.textContent = Math.floor(current);
            }
        }
    }, 30);
}

// Statistics Counter Observer
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const target = parseFloat(stat.getAttribute('data-target'));
                animateCounter(stat, target);
            });
            observer.unobserve(entry.target);
        }
    });
});

observer.observe(document.querySelector('.stats-section'));

// Chart Animation on Scroll
const chartObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Trigger chart animations
            setTimeout(() => {
                visitorChart.update('show');
                umkmChart.update('show');
                eventChart.update('show');
                comparisonChart.update('show');
            }, 500);
        }
    });
}, { threshold: 0.3 });

chartObserver.observe(document.querySelector('.stats-section'));

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Chart responsive resize handler
window.addEventListener('resize', function() {
    visitorChart.resize();
    umkmChart.resize();
    eventChart.resize();
    comparisonChart.resize();
});
    </script>
@endpush