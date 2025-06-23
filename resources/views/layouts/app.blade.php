<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Laboratorium Komputer Udinus</title>
    <link rel="icon" type="image/png" href="{{ asset('image/Udin.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<style>
    .member-card {
        text-align: center;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        max-width: 100px;
        min-height: 450px;
    }
    #pesan-kepala .img-fluid {
    max-height: 400px;
    object-fit: cover;
    }
    .member-card .card-img-top {
        width: 100%;
        height: 200px; /* Tetapkan tinggi gambar agar seragam */
        object-fit: cover; /* Pastikan gambar tidak terdistorsi */
    }
    .member-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .social-icons {
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: all 0.3s ease-in-out;
        background: rgba(128, 128, 128, 0.3);
        backdrop-filter: blur(5px);
        padding: 10px;
        border-radius: 30px;
        display: inline-flex;
        gap: 15px;
    }
    .member-card:hover .social-icons {
        bottom: 20px;
        opacity: 1;
    }

    /* NAVBAR FIXED STYLE */
    body {
        padding-top: 80px; /* Adjust based on your navbar height */
    }
    .hero-section {
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1920x1080');
        background-size: cover;
        background-position: center;
        padding: 20px;
    }
    .hero-section h1 {
    font-size: 2rem;
    }
    html {
    scroll-behavior: smooth;
    }
    .navbar-toggler {
    border: none;
    outline: none;
    padding: 5px 10px;
    transition: transform 0.3s ease-in-out;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar-toggler.collapsed {
        transform: rotate(0deg);
    }

    .navbar-toggler:not(.collapsed) {
        transform: rotate(90deg);
    }

    /* Efek transisi menu */
    .collapse {
        transition: height 0.3s ease-in-out;
    }
    .navbar {
        background-color: #114D91 !important;
        transition: all 0.3s ease;
    }

    .navbar .nav-link {
        color: white !important;
        padding: 0.5rem 1rem;
    }

    .navbar .nav-link:hover {
        color: #c9e4ff !important;
    }

    .navbar-scrolled {
        background-color: #0d3a6d !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .social-icons {
        /* Tambahkan ini */
        background-color: rgba(128, 128, 128, 0.3); /* Warna abu-abu transparan */
        backdrop-filter: blur(5px); /* Efek blur opsional */
        padding: 10px;
        border-radius: 30px;
        display: inline-flex;
        gap: 15px;

        /* Style yang sudah ada */
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: all 0.3s;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        transition: transform 0.3s;
    }

    .social-icons a:hover {
        transform: scale(1.2);
    }
    @media (min-width: 768px) {
    .hero-section h1 {
        font-size: 3rem;
    }
    }
    @media (max-width: 768px) {
    .member-card {
        min-height: auto;
    }
    }
    /* Responsive Font Size */
    @media (max-width: 768px) {
        html {
            font-size: 14px;
        }

        .hero-section h1 {
            font-size: 1.75rem;
        }

        .logo {
            width: 180px !important;
            height: auto !important;
        }
    }
    /* Perbaikan Hamburger Menu */
    .custom-toggler {
        border: none;
        background: transparent;
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .toggler-icon {
        width: 30px;
        height: 3px;
        background-color: white;
        transition: all 0.3s ease-in-out;
    }

    /* Ketika tombol ditekan */
    .custom-toggler[aria-expanded="true"] .toggler-icon:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .custom-toggler[aria-expanded="true"] .toggler-icon:nth-child(2) {
        opacity: 0;
    }

    .custom-toggler[aria-expanded="true"] .toggler-icon:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }

    /* Responsive Member Cards */
    @media (max-width: 768px) {
        #anggota .row {
            flex-direction: column;
            align-items: center !important;
        }

        .member-card {
            max-width: 80% !important;
            margin: 1rem auto;
            min-height: auto !important;
        }

        #pesan-kepala .row {
            flex-direction: column;
        }

        #pesan-kepala .col-md-4 {
            margin-bottom: 2rem;
        }
    }

    /* Gambar Responsif */
    img {
        max-width: 100%;
        height: auto;
    }
    /* Dropdown navbar */

    @media (min-width: 992px) {
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        margin-top: 0.5rem;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        border-radius: 10px;
        background-color: #114D91;
    }

    .dropdown-item {
        color: white !important;
        padding: 0.75rem 1.5rem;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: #1a68c7;
        color: #c9e4ff !important;
        padding-left: 2rem;
    }

    .dropdown-menu-end {
        right: 0;
        left: auto;
    }
    }
    /* Style untuk section media kegiatan */
    #media-kegiatan {
        background-color: #114D91;
        color: white; /* Jika teks sulit dibaca, ubah warnanya */
        padding: 50px 0; /* Beri padding agar lebih rapi */
    }

    #media-kegiatan .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 15px;
        overflow: hidden;
    }

    #media-kegiatan .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }

    #media-kegiatan .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
    }

    #media-kegiatan .card-title {
        min-height: 3rem;
        margin-bottom: 1rem;
    }

    #media-kegiatan .card-text {
        min-height: 6rem;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    /* pesan pesan */
    .rektor-section {
    position: relative;
    padding: 80px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('/image/bg.jpg') no-repeat center center;
    background-size: cover;
    min-height: 100vh; /* Agar section menutupi seluruh viewport */
    color: white; /* Supaya teks kontras */
    }

    /* Overlay gradasi + setengah lingkaran */
    .rektor-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 40%; /* Sesuaikan tinggi gradasi */
        background: linear-gradient(to bottom, #114D91, transparent);
        border-bottom-left-radius: 50% 80px; /* Membuat efek setengah lingkaran */
        border-bottom-right-radius: 50% 80px;
        z-index: 1;
    }

    /* Pastikan konten berada di atas overlay */
    .rektor-section > * {
        position: relative;
        z-index: 2;
    }

    /* Card utama */
    .rektor-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        max-width: 900px;
        text-align: center;
    }

    /* Gambar rektor */
    .rektor-img {
            max-width: 100%;  /* Pastikan gambar tidak lebih besar dari parent */
        max-height: 300px; /* Batasi tinggi gambar agar tidak terlalu besar */
        object-fit: contain; /* Pastikan gambar tidak terpotong secara aneh */
        border-radius: 10px; /* Opsional: Membuat sudut gambar lebih halus */
    }

    /* Judul */
    .rektor-card h5 {
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        color: #114D91;
    }

    /* Teks utama */
    .rektor-text {
        font-size: 1.2rem;
        font-style: italic;
        color: #333;
        margin-top: 15px;
    }

    /* Highlight teks (tebal & warna biru) */
    .highlight {
        font-weight: bold;
        color: blue;
    }

    /* Highlight teks bold dengan warna gelap */
    .highlight-bold {
        font-weight: bold;
        color: darkblue;
    }

    /* Bagian nama rektor */
    .rektor-name {
        background: #114D91;
        color: white;
        font-size: 1rem;
        padding: 10px;
        border-radius: 10px;
        margin-top: 20px;
        font-weight: bold;
        text-align: center;
    }
    /* Section Rekrutmen */
    /* Section Rekrutmen dengan Background Putih */
    .rekrutmen-section {
        background: url('/image/bgrekrutmen.jpg') no-repeat center center;
        background-size: cover; /* Agar gambar memenuhi area tanpa distorsi */
        background-position: center; /* Pusatkan gambar */

        min-height: 400px;
        padding: 60px 20px;
        color: white;
    }


    /* Subjudul */
    .rekrutmen-section .subjudul {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
        color: #333; /* Warna gelap untuk kontras */
        opacity: 0.8;
    }

    /* Judul */
    .rekrutmen-section .judul {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #114D91; /* Warna biru sesuai tema */
    }

    /* Tombol CTA */
    .rekrutmen-section .btn-primary {
        background: #114D91;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        color: white;
        transition: 0.3s;
    }

    .rekrutmen-section .btn-primary:hover {
        background: #0d3a6a;
    }
    /*  */
    .section {
        position: relative;
        background: #f0f0f0; /* Warna background seksi sebelumnya */
        padding-bottom: 50px;
    }

    .wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <!-- Logo tetap sama -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('image/1.png') }}" width="215" height="68" alt="Logo lab" class="logo">
            </a>

            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>

                    <!-- Item Profil Lab dengan dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#profil" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            Profil Lab
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#sejarah">Sejarah</a></li>
                            <li><a class="dropdown-item" href="{{ url('/visi-misi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#anggota">Anggota Lab</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#ruangan">Ruangan Lab</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('image/Udin.png') }}" alt="Logo lab" width="230">
            </div>
                <!-- Customer Support -->
                <div class="text-md-start text-center ms-3">
                    <h5 class="fw-bold mb-2">Laboratorium Komputer UDINUS</h5>
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope me-2"></i> lab@univ.ac.id</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Sadewa 2 No.8, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131</li>
                    </ul>
                </div>
            </div>
            <hr class="border-light my-3">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Lab Komputer. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
