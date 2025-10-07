<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- <i class="fas fa-university me-2 text-primary"></i>
                <span class="fw-bold text-primary">IPB University</span> -->
                <img src="{{ asset('/assets/img/logo.png') }}" alt="" class="footer-logo mb-2" style="width: 120px;">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#beranda" data-target-id="beranda">Beranda</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistik') }}" data-target-id="statistik">Statistik & Fakta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#fasilitas" data-target-id="fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('explore') }}" data-target-id="wisata">Wisata</a>
                    </li>
                </ul>
                
                <div class="ms-3">
                    <div class="input-group" style="width: 200px;">
                        <input type="text" class="form-control form-control-sm" placeholder="Pencarian">
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>


