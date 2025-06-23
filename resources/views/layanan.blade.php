@extends('layouts.app')

@section('content')
<!-- Tambahkan popup notifikasi di bagian atas content -->
<div class="custom-notification" id="successNotification">
    <div class="notification-content">
        <div class="notification-icon success">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="notification-text">
            <h4>Terima kasih!</h4>
            <p>Feedback Anda berhasil terkirim</p>
        </div>
        <button class="notification-close" onclick="closeNotification()">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold text-primary mb-3">Form Layanan Laboratorium</h2>
                <p class="text-muted">Silahkan isi form berikut untuk pelayanan kami terhadap anda</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" 
                               class="form-control" 
                               id="nama" 
                               name="nama"
                               required
                               placeholder="Masukkan nama lengkap">
                    </div>

                    <!-- Rating Bintang -->
                    <div class="mb-4">
                        <label class="form-label">Rating Pelayanan</label>
                        <div class="rating-group">
                            <div class="stars">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>
                            <input type="hidden" name="rating" id="ratingValue" required>
                        </div>
                    </div>

                    <!-- Kolom Pesan -->
                    <div class="mb-4">
                        <label for="pesan" class="form-label">Pesan/Komentar</label>
                        <textarea class="form-control" 
                                  id="pesan" 
                                  name="pesan" 
                                  rows="4"
                                  required
                                  placeholder="Silahkan berikan kompetar mengenai ( Lab komputer, pelayanan, dan laboran )..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Feedback
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Notification Styles */
.custom-notification {
    position: fixed;
    top: 20px;
    right: -100%;
    z-index: 9999;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    max-width: 400px;
    width: 90%;
}

.custom-notification.active {
    right: 20px;
}

.notification-content {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    border-left: 6px solid #4CAF50;
    position: relative;
}

.notification-icon {
    margin-right: 15px;
}

.notification-icon.success i {
    font-size: 32px;
    color: #4CAF50;
}

.notification-text h4 {
    margin: 0;
    color: #1a237e;
    font-weight: 600;
}

.notification-text p {
    margin: 5px 0 0;
    color: #666;
    font-size: 0.9em;
}

.notification-close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    cursor: pointer;
    color: #999;
    padding: 5px;
}

.notification-close:hover {
    color: #666;
}
/* Custom CSS */
.rating-group {
    margin-top: 10px;
}

.stars {
    display: flex;
    gap: 8px;
}

.star {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}

.star:hover,
.star.active {
    color: #ffd700;
}

#pesan {
    resize: none;
    transition: all 0.3s;
}

#pesan:focus {
    border-color: #114D91;
    box-shadow: 0 0 0 0.25rem rgba(17, 77, 145, 0.25);
}
.notification-content {
    transform: translateX(120%);
    transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.custom-notification.active .notification-content {
    transform: translateX(0);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('ratingValue');
    const notification = document.getElementById('successNotification');
    const feedbackForm = document.getElementById('feedbackForm');
    const submitButton = feedbackForm.querySelector('button[type="submit"]');
        // Tangani tombol Enter untuk submit form
        feedbackForm.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault(); // Mencegah baris baru di textarea
            submitButton.click(); // Klik tombol submit secara programatik
        }
    });
        // Fungsi untuk menampilkan notifikasi
        function showNotification() {
        notification.classList.add('active');
        setTimeout(() => {
            notification.classList.remove('active');
        }, 3000);
    }
    // Fungsi untuk menutup notifikasi
        window.closeNotification = function() {
        notification.classList.remove('active');
    }
    // Fungsi untuk memberikan rating bintang
    stars.forEach((star, index) => {
        star.addEventListener('click', function() {
            const value = parseInt(this.dataset.value);
            ratingValue.value = value;

            // Beri warna ke bintang dari 1 sampai yang diklik
            stars.forEach((s, i) => {
                s.classList.toggle('active', i < value);
            });
        });
    });

    // Validasi saat form dikirim
    document.getElementById('feedbackForm').addEventListener('submit', function(e) {
        if (!ratingValue.value) {
            e.preventDefault();
            alert('Silakan pilih rating terlebih dahulu!');
        }
    });

    // Notifikasi sukses dari server
    @if(session('success'))
        showNotification();
        document.getElementById('feedbackForm').reset();
        stars.forEach(star => star.classList.remove('active'));
        ratingValue.value = '';
    @endif
});
</script>
@endsection