@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="hero-section d-flex align-items-center text-white">
        <div class="container text-center">
            <h1 class="display-4">Selamat Datang di Lab Komputer</h1>
            <p class="lead">Teknologi Mutakhir untuk Pendidikan Berkualitas</p>
        </div>
    </section>

    <!-- Media Kegiatan -->
    <section id="media-kegiatan" class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h6 class="fw-bold text-white">Media</h6>
                    <h2 class="fw-bold text-white d-inline-block">Kegiatan Laboratorium Komputer</h2>
                    <div class="border-bottom border-warning border-3 mt-1" style="width: 200px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Card Kegiatan 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('image/kegiatan/kpajak.jpeg') }}" class="card-img-top" alt="Kegiatan Lab" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Pengecekan Pajak Kariawan UDINUS</h5>
                            <p class="card-text text-muted">Jumat, 14 Maret 2025 kegiatan ini dilakukan dalam rangka pengecekan apakah pegawai-pegawai UDINUS rutin membayar pajak dan apakah masih aktif membayar hingga saat ini...</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Card Kegiatan 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('image/kegiatan2.jpg') }}" class="card-img-top" alt="Kegiatan Lab" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Seminar Teknologi</h5>
                            <p class="card-text text-muted">Diskusi panel tentang perkembangan terbaru dalam bidang artificial intelligence dan implementasinya dalam industri 4.0. Menghadirkan pakar...</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Card Kegiatan 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('image/kegiatan3.jpg') }}" class="card-img-top" alt="Kegiatan Lab" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Pelatihan Jaringan</h5>
                            <p class="card-text text-muted">Praktikum konfigurasi jaringan tingkat lanjut menggunakan peralatan CISCO. Materi meliputi network security, VLAN configuration, dan...</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pesan Kepala Lab -->
    <section class="rektor-section">
        <div class="container d-flex justify-content-center">
            <div class="rektor-card">
                <div class="row align-items-center">
                    <!-- Bagian Gambar -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('image/0686.11.1996.106_Dr._Budi_Harjo__M.Kom-rem.png')}}" 
                            class="img-fluid rektor-img" 
                            alt="Rektor Udinus">
                    </div>
                    <!-- Bagian Teks -->
                    <div class="col-md-8">
                        <p class="rektor-text">
                            “Apakah anda berkeinginan untuk menggerakkan masa depan Indonesia sebagai 
                            <span class="highlight">seorang pengusaha</span>?<br>
                            Dengan bergabung bersama <span class="highlight-bold">Universitas Dian Nuswantoro</span>, kami akan menuntun anda untuk meraih <span class="highlight">masa depan yang cerah</span>.”
                        </p>
                        <div class="rektor-name">
                            Dr. Budi Harjo, M.Kom
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Tambahan -->
    <section class="section">
        <div class="content">
            <!-- Konten seksi di sini -->
        </div>
        <svg class="wave" viewBox="0 0 1440 320">
            <path fill="#ffffff" d="M0,192L80,192C160,192,320,192,480,186.7C640,181,800,171,960,165.3C1120,160,1280,160,1360,160L1440,160L1440,320L0,320Z"></path>
        </svg>
    </section>


    <!-- Seksi Rekrutmen -->
    <section class="rekrutmen-section">
        <div class="container d-flex flex-column align-items-center justify-content-center text-center">
            <h5 class="subjudul">REKRUTMEN</h5>
            <h1 class="judul">Kesempatan Berkarir Bersama Kami</h1>
            <a href="{{ route('rekrutmen') }}" class="btn btn-primary">DAFTAR SEKARANG</a>
        </div>
    </section>


    <!-- Tambahkan section lainnya sesuai kebutuhan -->
@endsection