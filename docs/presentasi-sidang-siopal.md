# PRESENTASI SIDANG SKRIPSI — SIOPAL UDINUS

> **Panduan:** Dokumen ini berisi konten 22 slide presentasi sidang.
> Setiap slide memiliki catatan `📸 SCREENSHOT` yang menunjukkan gambar apa yang harus di-attach.
> Gunakan file dari folder `docs/images/` dan screenshot aplikasi yang perlu ditangkap.

---

## SLIDE 1 — TITLE SLIDE

### Penerapan Teknik *Query Filtering Eloquent* untuk Penyelesaian Masalah *Constraint Satisfaction* dalam Penjadwalan Otomatis Laboratorium Komputer

**Studi Kasus: Lab Komputer FIK UDINUS**

---

**Disusun Oleh:**
- **Nama:** Dimas Daffa Ernanda
- **NIM:** A11.2022.14079
- **Program Studi:** Teknik Informatika

**Pembimbing:** *(Nama Dosen Pembimbing)*

Fakultas Ilmu Komputer — Universitas Dian Nuswantoro
Semarang, 2025

> 📸 **SCREENSHOT:** Attach logo UDINUS (`docs/images/udinus_logo.png`)

---

## SLIDE 2 — OUTLINE PRESENTASI

### Agenda Sidang

| No | Materi | Estimasi |
|:--:|--------|----------|
| 1 | Pendahuluan (Latar Belakang, Rumusan, Tujuan) | 3 menit |
| 2 | Landasan Teori (RAD, Eloquent Filtering) | 3 menit |
| 3 | Metode Penelitian (RAD 5 Tahap) | 3 menit |
| 4 | Perancangan Sistem (UML Diagrams) | 5 menit |
| 5 | Implementasi & Demo Aplikasi | 8 menit |
| 6 | Pengujian (Black Box + UAT 92,8%) | 5 menit |
| 7 | Kesimpulan & Saran | 3 menit |

> 📸 **SCREENSHOT:** Tidak diperlukan. Slide teks/ikon saja.

---

## SLIDE 3 — LATAR BELAKANG (The Pain Points)

### Urgensi Penelitian

**Kondisi Saat Ini:**
Penjadwalan praktikum di Lab Komputer FIK UDINUS **masih manual** menggunakan *spreadsheet*.

**3 Masalah Utama:**

| ❌ Masalah | 💥 Dampak |
|-----------|---------|
| **Human Error** | Bentrokan jadwal, salah alokasi lab |
| **Validasi Manual 4 Constraints** | Padat karya, memakan waktu lama |
| **Tidak ada sistem terpusat** | Inkonsistensi data, redundansi |

**4 Constraints yang harus divalidasi MANUAL:**
1. ✅ Ketersediaan Software (Matkul vs Lab)
2. ✅ Kapasitas Lab (Jumlah Mhs vs PC)
3. ✅ Jam Operasional (07:00–21:00)
4. ✅ Time Overlap (Anti-bentrok jadwal)

> 📸 **SCREENSHOT:** Attach gambar alur manual scheduling (`docs/images/manual_scheduling_pain.png`). Gambar ini mengilustrasikan betapa rumitnya proses verifikasi manual menggunakan spreadsheet.

---

## SLIDE 4 — CONSTRAINTS PENJADWALAN

### Kompleksitas Masalah — Constraint Satisfaction Problem (CSP)

```
┌─────────────────────────────────────────────────────┐
│           CONSTRAINT SATISFACTION PROBLEM            │
│                                                     │
│  Variabel: Jadwal (Lab + Hari + Slot Waktu)         │
│  Domain  : Semua kombinasi Lab × Hari × Slot        │
│  Solusi  : Assignment yang memenuhi SEMUA constraint │
└─────────────────────────────────────────────────────┘
```

| No | Constraint | Jenis | Implementasi |
|:--:|-----------|:-----:|-------------|
| 1 | Ketersediaan Software | Wajib | `whereHas()` + Collection `filter()` |
| 2 | Kapasitas Lab | Wajib | `where('pc_siap', '>=', jumlah)` |
| 3 | Jam Operasional | Wajib | Filter rentang waktu 07:00–21:00 |
| 4 | Time Overlap | Wajib | Slot exclusion + overlap detection |
| 5 | Break Times | Wajib | Collection `filter()` |
| 6 | Sesi Waktu | Wajib | Collection `filter()` (pagi/siang/malam) |
| 7 | Prioritas Lab-Prodi | Preferensi | `sortByDesc()` |
| 8 | Urutan SKS (Import) | Preferensi | SKS descending sort |

> 📸 **SCREENSHOT:** Tidak diperlukan. Tabel visual saja. Opsional: buat diagram CSP sederhana di Draw.io.

---

## SLIDE 5 — RUMUSAN MASALAH & BATASAN

### Fokus Penelitian

**Rumusan Masalah:**
1. Bagaimana menerapkan metode **RAD** untuk mengelola pengembangan fitur penjadwalan otomatis?
2. Bagaimana merancang **arsitektur data & model Eloquent** untuk merepresentasikan 4 constraints utama?
3. Bagaimana mengimplementasikan **algoritma Query Filtering Eloquent** berlapis untuk menyaring slot waktu tanpa *time overlap*?
4. Bagaimana menguji fungsionalitas melalui **Black Box Testing** dan mengukur penerimaan melalui **UAT**?

**Batasan Masalah:**
- Fokus: Fitur rekomendasi slot jadwal otomatis di panel admin SIOPAL
- Pendekatan: *Satisficing* (menemukan slot valid), **bukan** optimalisasi global
- Constraints yang diabaikan: Konflik jadwal dosen di tempat lain
- Output: Daftar rekomendasi slot → bukan pembuatan jadwal semester otomatis
- Data master (Lab, Matkul, Software) diasumsikan sudah tersedia di SIOPAL

> 📸 **SCREENSHOT:** Tidak diperlukan. Slide teks/bullet points.

---

## SLIDE 6 — TUJUAN & MANFAAT

### Value Proposition

**Tujuan Penelitian:**

| No | Tujuan |
|:--:|--------|
| 1 | Menerapkan metode **RAD** dalam manajemen proyek pengembangan |
| 2 | Menghasilkan rancangan **arsitektur data & model Eloquent** yang akurat |
| 3 | Mengimplementasikan **algoritma Query Filtering Eloquent** untuk menyelesaikan **CSP** |
| 4 | Memvalidasi fungsionalitas melalui **Black Box Testing** & **UAT** |

**Manfaat Penelitian:**

| Untuk Siapa | Manfaat |
|------------|---------|
| 🏢 **Administrator Lab** | Efisiensi ⬆️, Human error ⬇️, Waktu penyusunan ⬇️ |
| 🖥️ **Lab Komputer UDINUS** | Optimalisasi utilisasi aset (ruangan, PC, software) |
| 📚 **Bidang Ilmu** | Studi kasus CSP nyata + referensi teknis Eloquent tingkat lanjut |

> 📸 **SCREENSHOT:** Tidak diperlukan. Slide teks/ikon saja.

---

## SLIDE 7 — LANDASAN TEORI: RAD

### Rapid Application Development (RAD)

**Tahapan RAD (Besin, 2023):**

```
  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐    ┌──────────────┐    ┌──────────────┐
  │   BUSINESS   │───▶│    DATA      │───▶│   PROCESS    │───▶│ APPLICATION  │───▶│  TESTING &   │
  │  MODELLING   │    │  MODELLING   │    │  MODELLING   │    │  GENERATION  │    │  TURNOVER    │
  └──────────────┘    └──────────────┘    └──────────────┘    └──────────────┘    └──────────────┘
    Wawancara &         ERD, Relasi        Use Case,           Laravel +           Black Box +
    Business Rules      Tabel Pivot        Activity,           Filament            UAT
                                           Sequence
```

**Penekanan RAD dalam penelitian ini:**
- ⏱️ Siklus pengembangan **singkat** (30–90 hari)
- 🔄 **Prototipe** untuk mendapat umpan balik cepat dari administrator
- ♻️ **Reuse** komponen (Laravel, Filament, Livewire)
- 👥 **Keterlibatan pengguna** langsung di setiap tahapan

**Referensi:** Lukman Santoso & Juni Amanullah (2022) — RAD efektif untuk SI Akademik berbasis web

> 📸 **SCREENSHOT:** Tidak diperlukan, atau bisa attach diagram RAD dari skripsi (Gambar 1 di dokumen).

---

## SLIDE 8 — LANDASAN TEORI: ELOQUENT FILTERING

### Teknik Query Filtering & Eager Loading

**Teknik Inti yang Digunakan:**

| Teknik | Metode Laravel | Fungsi dalam SIOPAL |
|--------|---------------|---------------------|
| Query Filtering | `where()`, `whereHas()`, `whereBetween()` | Memfilter lab berdasarkan kapasitas & software |
| Query Chaining | Method chaining pada Eloquent Builder | Menyambungkan filter secara berurutan |
| Eager Loading | `with()` | Mencegah N+1 Problem |
| Collection Filter | `filter()`, `sortByDesc()` | Filter sesi, break times, prioritas |

**Masalah N+1 Problem (Harahap, 2022):**
```
❌ Lazy Loading:  1 query induk + N query relasi = N+1 queries
                  → Waktu meningkat linier, tidak stabil

✅ Eager Loading: 1 query induk + 1 query relasi = 2 queries
                  → Waktu stabil < 200ms, konstan 4 query
```

**Optimasi pada SIOPAL:**
```php
// Eager Loading untuk mencegah N+1
Laboratory::where('is_active', true)
    ->where('pc_siap', '>=', $studentCount)
    ->whereHas('software', ..., '>=', $requiredCount)
    ->with(['priorityProdis', 'kategori'])  // ← Eager Loading
    ->get();
```

> 📸 **SCREENSHOT:** Tidak diperlukan. Code snippet + tabel visual.

---

## SLIDE 9 — KERANGKA PEMIKIRAN

### Alur Berpikir Penelitian

```
┌───────────────────┐
│   MASALAH          │    Penjadwalan manual → human error, bentrokan,
│   (Manual)         │    inefisiensi validasi 4+ constraints
└────────┬──────────┘
         ▼
┌───────────────────┐
│   TUJUAN           │    Otomatisasi pencarian slot valid
│   (Otomatisasi)    │    menggunakan Query Filtering Eloquent
└────────┬──────────┘
         ▼
┌───────────────────────────────────────────────────────┐
│   TOOLS & TEKNOLOGI                                    │
│   Laravel 12 + Filament 3 + MySQL + Livewire           │
└────────┬──────────────────────────────────────────────┘
         ▼
┌───────────────────┐
│   METODE           │    RAD (5 Tahap) + UML
│   (RAD)            │    + Black Box + UAT
└────────┬──────────┘
         ▼
┌───────────────────────────────────────────────────────┐
│   HASIL                                                │
│   Rekomendasi Slot Valid (Lab, Hari, Jam)               │
│   → 100% Bebas Konflik | UAT 92,8% Sangat Layak       │
└───────────────────────────────────────────────────────┘
```

> 📸 **SCREENSHOT:** Tidak diperlukan. Diagram flow/tabel kerangka pemikiran.

---

## SLIDE 10 — METODE PENELITIAN: PENGUMPULAN DATA

### Wawancara & Studi Pustaka

**1. Wawancara — dengan Koordinator Lab:**

Pertanyaan kunci yang diajukan:
- Bagaimana alur penerimaan permintaan jadwal praktikum?
- Batasan kapasitas spesifik per laboratorium?
- Aturan jam operasional lab? (07:00–21:00)
- Frekuensi bentrokan jadwal dengan sistem manual?
- Fitur prioritas apa yang paling dibutuhkan?

**Hasil wawancara → 8 Business Rules → 8 Constraint Sistem**

**2. Studi Pustaka:**

| Topik | Referensi Utama |
|-------|----------------|
| CSP & Backtracking | Wulandari et al. (2022) |
| N+1 Problem & Eager Loading | Harahap (2022), Krisna et al. (2024) |
| Query Filtering Eloquent | Akhdani & Wijayanto (2022) |
| RAD Methodology | Lukman Santoso & Juni Amanullah (2022) |
| Optimalisasi Query | Apriza & Sutabri (2025) |

> 📸 **SCREENSHOT:** Tidak diperlukan. Slide teks/tabel referensi.

---

## SLIDE 11 — ANALISIS KEBUTUHAN: BUSINESS RULES

### Aturan Bisnis → Constraint Sistem

**Data Input yang Diperlukan:**

```
📥 INPUT ADMINISTRATOR
├── Program Studi
├── Mata Kuliah
├── Dosen Pengampu
├── Jumlah Siswa
├── Kode Kelompok
└── Sesi Waktu (Pagi / Siang / Malam)
```

**Proses Filtering 6 Tahap:**

```
INPUT → [1] Filter Kapasitas → [2] Filter Software → [3] Deteksi Konflik
     → [4] Filter Sesi → [5] Filter Break Times → [6] Sort Prioritas → OUTPUT
```

**Output Rekomendasi:**

```
📤 OUTPUT SISTEM
├── Nama Laboratorium (+ indikator prioritas ⭐)
├── Hari (Senin – Jumat)
├── Jam Mulai – Jam Selesai
└── Status: 100% Bebas Konflik ✅
```

**Dua Mode Input:**
1. **Input Satuan** — Wizard interaktif per mata kuliah
2. **Import Massal** — Upload Excel untuk ratusan jadwal sekaligus

> 📸 **SCREENSHOT:** Tidak diperlukan. Diagram alur data.

---

## SLIDE 12 — PERANCANGAN: USE CASE DIAGRAM

### Interaksi Aktor & Sistem

**Aktor:** Administrator Laboratorium

**Use Cases:**

| No | Use Case | Relasi | Deskripsi |
|:--:|----------|:------:|-----------|
| 1 | Login | — | Autentikasi via Laravel Filament |
| 2 | Kelola Data Laboratorium | `<<include>>` Login | CRUD lab + konfigurasi penjadwalan |
| 3 | Kelola Data Mata Kuliah | `<<include>>` Login | CRUD matkul + kebutuhan software |
| 4 | Cari Slot Otomatis (Satuan) | `<<include>>` Login | 6 tahap Eloquent Query Filtering |
| 5 | Import Jadwal Massal | `<<include>>` Login | Triple nested loop via Excel |
| 6 | Lihat Tabel Jadwal | `<<include>>` Login | Grid visual per lab per hari |
| 7 | Kelola Data Jadwal (CRUD) | `<<include>>` Login | CRUD manual + validasi konflik |

> 📸 **SCREENSHOT:** Attach **Use Case Diagram** (`docs/images/usecase_diagram.png`). Ini adalah gambar utama yang menunjukkan seluruh interaksi aktor dengan sistem.

---

## SLIDE 13 — PERANCANGAN: ERD (Entity Relationship)

### Arsitektur Data

**Entitas Utama & Relasi:**

```
┌──────────────┐       M:N        ┌──────────────┐
│  Laboratorium │◄────────────────►│   Software   │
│              │  (lab_software)   │              │
└──────┬───────┘                  └──────┬───────┘
       │ 1:N                             │ M:N
       ▼                                 ▼
┌──────────────┐                  ┌──────────────┐
│   Schedule   │◄─────────────────│    Course    │
│              │      M:1         │  (Mata Kuliah)│
└──────────────┘                  └──────────────┘
                                         │ M:N
                                         ▼
                                  ┌──────────────┐
                                  │course_software│
                                  │ (tabel pivot) │
                                  └──────────────┘
```

**Tabel Pivot (Many-to-Many):**
- `lab_software` → Lab memiliki software apa saja
- `course_software` → Matkul membutuhkan software apa saja
- `lab_prodi_priority` → Lab diprioritaskan untuk prodi mana

**Atribut Kunci untuk Algoritma Filtering:**
- `laboratoria.pc_siap` → Constraint kapasitas
- `laboratoria.is_active` → Filter lab aktif
- `schedules.slot_number`, `duration_slots` → Deteksi bentrok

> 📸 **SCREENSHOT:** Attach **ERD Diagram** (`docs/images/erd_diagram.png`). Gambar ini menunjukkan seluruh hubungan tabel yang mendukung algoritma filtering.

---

## SLIDE 14 — PERANCANGAN: SEQUENCE DIAGRAM

### Logika Pencarian Slot — Alur Interaksi Komponen

**Aktor → Antarmuka → Service → Database:**

```
Administrator         ScheduleWizard        SchedulingService         Database
     │                      │                       │                      │
     │──── Isi Formulir ────►│                       │                      │
     │                      │                       │                      │
     │── Klik "Cari Slot" ──►│                       │                      │
     │                      │── findAvailableSlots()─►│                      │
     │                      │                       │── where(is_active) ──►│
     │                      │                       │── where(pc_siap>=) ──►│
     │                      │                       │── whereHas(software)─►│
     │                      │                       │◄── Labs tersaring ────│
     │                      │                       │                      │
     │                      │                       │── getAvailableSlots()─│
     │                      │                       │   per Lab × per Hari  │
     │                      │                       │── filter(sesi) ───────│
     │                      │                       │── filter(breakTimes) ─│
     │                      │                       │── sortByDesc(priority)│
     │                      │                       │                      │
     │                      │◄── Hasil Rekomendasi ──│                      │
     │◄── Tampilkan Kartu ──│                       │                      │
     │                      │                       │                      │
     │── Pilih Kartu ───────►│                       │                      │
     │                      │── createSchedule() ───►│                      │
     │                      │                       │── hasConflict()? ────►│
     │                      │                       │── save() ────────────►│
     │◄── Notifikasi OK ────│                       │                      │
```

> 📸 **SCREENSHOT:** Attach **Sequence Diagram** (`docs/images/sequence_diagram.png`). Gambar ini menunjukkan alur teknis dari klik "Cari Slot" hingga jadwal tersimpan.

---

## SLIDE 15 — IMPLEMENTASI: SCHEDULING SERVICE (Core Logic)

### Algoritma Filtering 6 Tahap — Jantung SIOPAL

```
📥 INPUT (Matkul, SKS, Jumlah Siswa, Sesi Waktu)
     │
     ▼
┌──────────────────────────────────────────────────┐
│  STEP 1: Filter Lab Aktif & Kapasitas             │  ← Eloquent where()
│  where('is_active', true)->where('pc_siap','>=')  │     DATABASE LAYER
├──────────────────────────────────────────────────┤
│  STEP 2: Filter Software Terinstal                │  ← Eloquent whereHas()
│  whereHas('software', fn => whereIn($ids), '>=')  │     DATABASE LAYER
├──────────────────────────────────────────────────┤
│  STEP 3: Deteksi Konflik Slot Terisi              │  ← Eloquent + PHP Loop
│  getOccupiedSlotNumbers() → filter consecutive    │     HYBRID
├──────────────────────────────────────────────────┤
│  STEP 4: Filter Sesi Waktu                        │  ← Collection filter()
│  Pagi (07:00–12:20), Siang (12:30–18:20),         │     APPLICATION LAYER
│  Malam (18:30–22:00)                              │
├──────────────────────────────────────────────────┤
│  STEP 5: Eliminasi Break Times                    │  ← Collection filter()
│  Overlap detection: start < breakEnd AND          │     APPLICATION LAYER
│  end > breakStart → ELIMINASI                     │
├──────────────────────────────────────────────────┤
│  STEP 6: Sortir Prioritas Lab-Prodi               │  ← usort() + sortByDesc()
│  Lab prioritas prodi → ditampilkan di atas (⭐)   │     APPLICATION LAYER
└──────────────────────────────────────────────────┘
     │
     ▼
📤 OUTPUT (Daftar Rekomendasi per Hari: Lab + Waktu + ⭐)
```

**Klasifikasi 2 Lapisan:**

| Lapisan | Step | Teknik | Keuntungan |
|---------|:----:|--------|-----------|
| Database (SQL) | 1, 2 | `where()`, `whereHas()` | Mengurangi data sebelum ke PHP |
| Aplikasi (PHP) | 3, 4, 5, 6 | Collection `filter()`, `sort()` | Kalkulasi waktu dinamis |

> 📸 **SCREENSHOT:** Tidak diperlukan. Diagram visual sudah cukup jelas. Opsional: screenshot potongan kode `SchedulingService.php`.

---

## SLIDE 16 — UI: DASHBOARD SIOPAL

### Antarmuka Utama — Halaman Pertama Setelah Login

**Widget Statistik Real-time:**

| Widget | Sumber Data |
|--------|------------|
| 👥 Total Laboran | Tabel `users` (filtered by role) |
| 🏢 Total Laboratorium | Tabel `laboratoria` |
| 💻 Total PC | Tabel `inventories` (tipe: PCDetail) |
| 📦 Total Non-PC | Tabel `inventories` (tipe: non-PC) |
| 🖥️ Total Software | Tabel `inventories` (tipe: SoftwareDetail) |

**Fitur Tambahan:**
- 📅 Widget Kalender Akademik
- 🔒 Sistem otorisasi berbasis Gate (hanya user terautentikasi)

> 📸 **SCREENSHOT:** **Tangkap halaman Dashboard** (`/admin`). Pastikan kelima kartu statistik terlihat (Total Laboran, Total Laboratorium, Total PC, Total Non-PC, Total Software) beserta widget kalender. Ini menunjukkan landing page setelah admin login.

---

## SLIDE 17 — UI: SCHEDULE WIZARD (Input Satuan)

### Fitur Rekomendasi Jadwal — Mode Input Satuan

**Formulir Input Reaktif (Livewire `live()`):**

| No | Field | Behavior |
|:--:|-------|----------|
| 1 | Program Studi | Dropdown — memperbarui Mata Kuliah secara reaktif |
| 2 | Mata Kuliah | Dropdown — difilter berdasarkan Prodi terpilih |
| 3 | Dosen Pengampu | Dropdown |
| 4 | Jumlah Siswa | Text Input |
| 5 | Kode Kelompok | Auto-generate: "{kode_prodi}.{input}" → "A11.0001" |
| 6 | Sesi Waktu | Select: Pagi / Siang / Malam |

**Hasil Rekomendasi:**
- 📋 Tab per hari (Senin – Jumat)
- 🃏 Kartu per opsi jadwal: Nama Lab, Kapasitas, Waktu, Indikator ⭐
- ⭐ Lab prioritas prodi ditampilkan di posisi **teratas**
- 🔒 **Double-check** konflik saat klik kartu (anti *race condition*)

> 📸 **SCREENSHOT (2 gambar):**
> 1. **Screenshot Formulir Input** — Buka menu "Penjadwalan" → "Penjadwalan Otomatis". Tangkap tampilan formulir dengan semua field terisi.
> 2. **Screenshot Hasil Rekomendasi** — Setelah menekan "Cari Slot Tersedia", tangkap kartu-kartu rekomendasi pada salah satu tab hari. Pastikan ada beberapa kartu yang terlihat, termasuk minimal satu dengan indikator prioritas (⭐).

---

## SLIDE 18 — UI: IMPORT MASSAL VIA EXCEL

### Efisiensi Skala Besar — Memproses Ratusan Jadwal Sekaligus

**Algoritma Triple Nested Loop:**

```
FOR setiap Hari (Senin–Jumat, diurutkan berdasarkan beban terendah):
    FOR setiap Slot Waktu (sesuai sesi):
        IF slot melewati break time → SKIP
        FOR setiap Lab (diurutkan prioritas prodi):
            IF slot tersedia → ASSIGN & markSlotUsed()
            → STOP pencarian untuk entri ini
```

**Optimasi Performa:**
- 📊 **Heuristik MCV**: Mata kuliah SKS tinggi diproses duluan (lebih sulit ditempatkan)
- 💾 **In-Memory Tracking**: `$usedSlotNumbers[]` → mencegah bentrok antar baris Excel TANPA query database berulang
- 📉 Dari potensial **2.500+ queries** → hanya **puluhan queries**

**Status Preview:**

| Status | Warna | Keterangan |
|--------|:-----:|-----------|
| ✅ OK | 🟢 Hijau | Berhasil ditempatkan, data sesuai |
| ⚠️ Warning | 🟡 Kuning | Berhasil ditempatkan, ada ketidaksesuaian data |
| ❌ Error | 🔴 Merah | Gagal — tidak ada slot tersedia |

> 📸 **SCREENSHOT (2 gambar):**
> 1. **Screenshot Modal Import** — Klik tombol "Import Excel" di bagian atas, unggah file Excel contoh, tangkap tampilan modal upload.
> 2. **Screenshot Tabel Preview** — Setelah menekan "Proses", tangkap tabel preview dengan status OK/Warning/Error yang terlihat, beserta ringkasan statistik (total jadwal, berhasil, warning, gagal) di bagian atas.

---

## SLIDE 19 — UI: TIMETABLE VISUAL & EXPORT

### Output Jadwal — Visualisasi Grid per Laboratorium

**Struktur Timetable:**

```
          │  SENIN   │  SELASA  │  RABU    │  KAMIS   │  JUMAT   │
──────────┼──────────┼──────────┼──────────┼──────────┼──────────┤
 07:00    │  ██████  │          │  ██████  │          │  ██████  │
 07:50    │  ██████  │          │  ██████  │          │  ██████  │
 08:40    │          │  ██████  │          │  ██████  │          │
 09:30    │          │  ██████  │          │  ██████  │          │
   ...    │   ...    │   ...    │   ...    │   ...    │   ...    │
 20:10    │          │  ██████  │          │          │          │
──────────┴──────────┴──────────┴──────────┴──────────┴──────────┘
  ██████ = Slot terisi (Nama Matkul + Kode Kelompok)
```

**Fitur:**
- 📋 Dropdown pemilihan laboratorium
- 🎨 Slot terisi ditandai **warna** + info ringkas (matkul, kelompok)
- 📊 Mudah mengidentifikasi slot kosong & tingkat okupansi
- 📥 **Export ke Excel** — satu sheet per laboratorium
- 📤 **Import dari Excel** — format lab per sheet

> 📸 **SCREENSHOT:** **Tangkap Halaman Timetable** — Buka menu "Penjadwalan" → "Tabel Jadwal". Pilih salah satu laboratorium dari dropdown dan tangkap tampilan grid jadwal per hari × slot waktu. Pastikan ada beberapa slot terisi dengan warna.

---

## SLIDE 20 — HASIL PENGUJIAN: BLACK BOX TESTING

### Validasi Fungsional — 100% Berhasil

**Ringkasan 22 Skenario Uji + 8 Uji Algoritma = 30 Total:**

| Kategori Pengujian | Jumlah | ✅ Valid | ❌ Invalid | % |
|-------------------|:------:|:-------:|:---------:|:--:|
| Fungsionalitas Antarmuka | 6 | 6 | 0 | 100% |
| Validasi Constraint | 8 | 8 | 0 | 100% |
| Import Massal | 4 | 4 | 0 | 100% |
| Skenario Batas (Edge Cases) | 4 | 4 | 0 | 100% |
| **Uji Algoritma Penjadwalan** | **8** | **8** | **0** | **100%** |
| **TOTAL** | **30** | **30** | **0** | **100%** |

**Highlight Skenario Kritis:**

| Skenario | Input | Hasil |
|----------|-------|-------|
| Siswa > semua kapasitas lab | Jumlah Siswa: 999 | ❌ "Lab dengan kapasitas ≥ 999 PC tidak ditemukan" |
| Software khusus (Adobe Premiere) | Matkul butuh Premiere Pro | ✅ Hanya lab dengan Premiere muncul |
| Double-click kartu rekomendasi | Klik cepat 2× | ✅ Hanya 1 jadwal tersimpan, klik ke-2 → "Slot sudah terisi" |
| Import lab penuh | Excel melebihi slot | ✅ Status Error + pesan alasan jelas |

> 📸 **SCREENSHOT:** Opsional — tangkap salah satu skenario pengujian, misalnya screenshot hasil pencarian dengan input Jumlah Siswa 999 yang menunjukkan notifikasi error, ATAU screenshot tabel daftar jadwal yang membuktikan 0 bentrok.

---

## SLIDE 21 — HASIL PENGUJIAN: UAT

### Penerimaan Pengguna — 92,8% Sangat Layak

**Profil Pengujian:**
- 👥 **35 Responden** (Staff Lab / Laboran + Dosen / Kaprodi)
- 📝 **19 Pertanyaan** dalam 5 aspek
- 📏 **Skala Likert 1–5** (STS → SS)

**Hasil per Aspek:**

| No | Aspek | Skor | Skor Ideal | Persentase | Kategori |
|:--:|-------|:----:|:----------:|:----------:|:--------:|
| 1 | **Fungsionalitas** | 650 | 700 | **92,9%** | Sangat Layak |
| 2 | **Kemudahan Penggunaan** | 650 | 700 | **92,9%** | Sangat Layak |
| 3 | **Keandalan** | 485 | 525 | **92,4%** | Sangat Layak |
| 4 | **Efisiensi** 🏆 | 488 | 525 | **93,0%** | Sangat Layak |
| 5 | **Kesesuaian & Kepuasan** | 811 | 875 | **92,7%** | Sangat Layak |
| | **TOTAL** | **3084** | **3325** | **92,8%** | **Sangat Layak** |

```
Persentase per Aspek:

Fungsionalitas    ████████████████████████████████████████████████  92,9%
Kemudahan         ████████████████████████████████████████████████  92,9%
Keandalan         ███████████████████████████████████████████████   92,4%
Efisiensi     🏆  █████████████████████████████████████████████████ 93,0%
Kesesuaian        ████████████████████████████████████████████████  92,7%
──────────────────────────────────────────────────────────────────
RATA-RATA                                                          92,8%
```

**Temuan Kunci:**
- 🏆 **Efisiensi** menjadi aspek tertinggi (93,0%) — pengguna merasakan pengurangan waktu signifikan
- 🔒 **Keandalan** 92,4% — sistem TIDAK PERNAH merekomendasikan jadwal bentrok
- ✅ Batas minimum keberhasilan **> 61%** → Terpenuhi dengan **92,8%**

> 📸 **SCREENSHOT:** Opsional — tangkap grafik bar chart hasil UAT (bisa buat di PowerPoint/Draw.io) atau tampilkan tabel rekapitulasi ini secara visual.

---

## SLIDE 22 — KESIMPULAN & SARAN

### Penutup

**✅ Kesimpulan:**

1. **Metode RAD** berhasil diterapkan melalui 5 tahapan, memungkinkan keterlibatan langsung administrator di setiap tahapan pengembangan.

2. **Arsitektur data** berhasil merepresentasikan 4 constraints utama penjadwalan (kapasitas, software, jam operasional, ketersediaan waktu) melalui model Eloquent dan relasi tabel pivot.

3. **Algoritma Eloquent Query Filtering 6 tahap** berhasil menyelesaikan CSP penjadwalan dengan pendekatan *layered filtering* (Database Layer + Application Layer), menghasilkan jadwal **100% bebas konflik**.

4. **Pengujian komprehensif:**
   - Black Box Testing: **30/30 skenario Valid (100%)**
   - UAT: **92,8% — Sangat Layak** (35 responden)

**📌 Saran Pengembangan Selanjutnya:**

| No | Saran | Deskripsi |
|:--:|-------|-----------|
| 1 | 🧬 **Algoritma Heuristik** | Integrasi *Genetic Algorithm* / *Simulated Annealing* untuk dataset berskala besar & constraint dinamis |
| 2 | 📅 **Integrasi Kalender Eksternal** | Sinkronisasi Google Calendar / Outlook + notifikasi WhatsApp Gateway |
| 3 | 👨‍🔬 **Modul Asisten Lab** | Pencocokan otomatis jadwal praktikum dengan ketersediaan asisten lab |
| 4 | 📊 **Analisis Utilitas Ruang** | Visualisasi grafik utilisasi lab + rekomendasi pemeliharaan berbasis data pemakaian |

---

### 🙏 Terima Kasih

**Dimas Daffa Ernanda — A11.2022.14079**
Teknik Informatika — Universitas Dian Nuswantoro

> 📸 **SCREENSHOT:** Tidak diperlukan. Slide penutup + logo UDINUS.

---

# LAMPIRAN: DAFTAR SCREENSHOT YANG PERLU DITANGKAP

## ✅ Gambar Sudah Tersedia (dari folder `docs/images/`)

| File | Digunakan di Slide |
|------|-------------------|
| `udinus_logo.png` | Slide 1 (Title) & Slide 22 (Penutup) |
| `manual_scheduling_pain.png` | Slide 3 (Latar Belakang) |
| `usecase_diagram.png` | Slide 12 (Use Case Diagram) |
| `erd_diagram.png` | Slide 13 (ERD) |
| `sequence_diagram.png` | Slide 14 (Sequence Diagram) |
| `class_diagram.png` | Opsional — bisa ditambahkan sebagai slide tambahan |
| `activity_login.png` | Opsional — backup slide Activity |
| `activity_single_input.png` | Opsional — backup slide Activity |
| `activity_bulk_import.png` | Opsional — backup slide Activity |
| `activity_timetable.png` | Opsional — backup slide Activity |

## 📸 Screenshot Aplikasi yang PERLU DITANGKAP

| No | Screenshot | Halaman Aplikasi | Slide |
|:--:|-----------|-----------------|:-----:|
| 1 | **Dashboard** | `/admin` setelah login | Slide 16 |
| 2 | **Daftar Laboratorium** | Menu → Master Data → Data Laboratorium | Opsional |
| 3 | **Formulir Laboratorium** | Edit/Tambah Lab (3 seksi) | Opsional |
| 4 | **Daftar Mata Kuliah** | Menu → Master Data → Data Mata Kuliah | Opsional |
| 5 | **Schedule Wizard — Formulir** | Menu → Penjadwalan → Penjadwalan Otomatis | Slide 17 |
| 6 | **Schedule Wizard — Hasil Rekomendasi** | Setelah klik "Cari Slot Tersedia" (kartu ⭐) | Slide 17 |
| 7 | **Import Excel — Modal Upload** | Klik "Import Excel" di Schedule Wizard | Slide 18 |
| 8 | **Import Excel — Preview Tabel** | Setelah klik "Proses" (status OK/Warning/Error) | Slide 18 |
| 9 | **Timetable Grid** | Menu → Penjadwalan → Tabel Jadwal | Slide 19 |
| 10 | **Daftar Jadwal (Schedule Resource)** | Menu → Penjadwalan → Data Jadwal | Opsional |

> **Prioritas Tinggi (WAJIB):** Screenshot 1, 5, 6, 8, 9
> **Prioritas Menengah:** Screenshot 7, 10
> **Opsional:** Screenshot 2, 3, 4
