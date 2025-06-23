@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Form Pendaftaran Laboratorium Komputer</h1>

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <form method="POST" action="{{ route('rekrutmen.submit') }}" enctype="multipart/form-data" class="border p-4 rounded-3 shadow">
        @csrf

        <!-- Input Nama dan NIM -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
        </div>

        <!-- Input Program Studi -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="program_studi" class="form-label"></label>
                <label for="fakultas" class="form-label">Fakultas</label>
                <select class="form-control" id="fakultas" name="fakultas" required onchange="updateProgramStudi()">
                    <option value="" disabled selected>Pilih Fakultas</option>
                    <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                    <option value="Fakultas Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                    <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                    <option value="Fakultas Kesehatan">Fakultas Kesehatan</option>
                    <option value="Fakultas Teknik">Fakultas Teknik</option>
                    <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                </select>
            </div>
            <div class="col-md-6">
            <label for="program_studi" class="form-label">Program Studi</label>
                <select class="form-control" id="program_studi" name="program_studi" required disabled>
                    <option value="" disabled selected>Pilih Program Studi</option>
                </select>
            </div>
        </div>

        <!-- Input No HP -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="no_hp" class="form-label">No Handphone / WhatsApp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
        </div>

        <!-- Upload Files -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="surat_lamaran" class="form-label">Surat Lamaran Kerja (PDF/DOC)</label>
                <input type="file" class="form-control" id="surat_lamaran" name="surat_lamaran" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="col-md-6">
                <label for="cv" class="form-label">Curriculum Vitae - CV (PDF/DOC)</label>
                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
            </div>
        </div>

        <!-- Upload Transkrip dan Sertifikat -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="transkrip" class="form-label">Transkrip Nilai (PDF)</label>
                <input type="file" class="form-control" id="transkrip" name="transkrip" accept=".pdf" required>
            </div>
            <div class="col-md-6">
                <label for="sertifikat" class="form-label">Sertifikat Pendukung (Opsional)</label>
                <input type="file" class="form-control" id="sertifikat" name="sertifikat" accept=".pdf,.doc,.docx" required>
            </div>
        </div>


        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Submit Pendaftaran</button>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>

<script>
    function updateProgramStudi() {
        const fakultas = document.getElementById('fakultas').value;
        const programStudiSelect = document.getElementById('program_studi');

        // Kosongkan Program Studi dulu
        programStudiSelect.innerHTML = '<option value="" disabled selected>Pilih Program Studi</option>';

        const prodiMap = {
            "Fakultas Ilmu Komputer": [
                "Teknik Informatika (S1)",
                "Teknik Informatika Kediri (S1)",
                "Sistem Informasi (S1)",
                "Sistem Informasi Kediri (S1)",
                "Teknik Informatika (D3)",
                "Ilmu Komunikasi (S1)",
                "Desain Komunikasi Visual (S1)",
                "Desain Komunikasi Visual Kediri (S1)",
                "Magister Teknik Informatika (S2)",
                "Doktor Ilmu Komputer (S3)",
                "Film dan Televisi (SST)",
                "Animasi (SST)",
                "PJJ Informatika (S1)"
            ],
            "Fakultas Ekonomi & Bisnis": [
                "Akuntansi (S1)",
                "Manajemen (S1)",
                "Manajemen PSDKU Kediri (S1)",
                "Magister Manajemen (S2)",
                "Magister Akuntansi (S2)",
                "Doktor Manajemen (S3)"
            ],
            "Fakultas Ilmu Budaya": [
                "Bahasa Inggris (S1)",
                "Bahasa Jepang (S1)",
                "Pengelolaan Perhotelan (SST)"
            ],
            "Fakultas Kesehatan": [
                "Kesehatan Lingkungan (S1)",
                "Kesehatan Masyarakat (S1)",
                "Rekam Medik & Informasi Kesehatan (D3)",
                "Magister Kesehatan Masyarakat (S2)"
            ]
        };

        if (prodiMap[fakultas]) {
            prodiMap[fakultas].forEach(function(prodi) {
                const option = document.createElement('option');
                option.value = prodi;
                option.text = prodi;
                programStudiSelect.appendChild(option);
            });

            programStudiSelect.disabled = false;
        } else {
            programStudiSelect.disabled = true;
        }
    }
</script>

@endsection

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    form {
        background-color: #ffffff;
    }
    label {
        font-weight: 600;
    }
</style>
