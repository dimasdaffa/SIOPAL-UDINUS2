# Narasi Penjelasan Istilah Teknis — Sidang Skripsi SIOPAL

> **Panduan:** Narasi ini disiapkan agar Anda bisa menjelaskan istilah-istilah teknis kepada dosen penguji dengan bahasa yang sederhana, menggunakan analogi sehari-hari, lalu dikaitkan ke implementasi SIOPAL.

---

## 1. Constraint (Batasan)

**Narasi untuk dosen:**

> "**Constraint** itu sederhananya adalah **aturan atau syarat yang tidak boleh dilanggar**. Sama seperti ketika kita mau booking ruang rapat — ada syarat: ruangannya harus muat orangnya, proyektor harus tersedia, dan waktunya tidak boleh bentrok dengan rapat lain.
>
> Dalam konteks SIOPAL, constraint-nya ada empat utama:
> 1. **Lab harus punya software** yang dibutuhkan mata kuliah (misal: Adobe Premiere).
> 2. **Jumlah PC di lab harus cukup** untuk jumlah mahasiswa.
> 3. **Jadwal harus di jam operasional** (07:00–21:00).
> 4. **Tidak boleh bentrok** dengan jadwal yang sudah ada di lab dan hari yang sama.
>
> Jadi setiap jadwal yang dihasilkan sistem harus memenuhi **semua** syarat ini. Kalau satu saja tidak terpenuhi, jadwal itu ditolak."

---

## 2. Constraint Satisfaction Problem (CSP)

**Narasi untuk dosen:**

> "**CSP** atau *Constraint Satisfaction Problem* adalah **istilah formal dalam ilmu komputer** untuk masalah di mana kita harus mencari solusi yang memenuhi **semua batasan sekaligus**.
>
> Analoginya seperti menyusun puzzle Sudoku — kita punya kotak-kotak kosong (variabel), angka 1–9 yang bisa diisi (domain), dan aturan bahwa tidak boleh ada angka yang sama di baris, kolom, atau kotak yang sama (constraint). Kita harus menemukan pengisian yang memenuhi semua aturan itu.
>
> Dalam SIOPAL, **variabelnya** adalah kombinasi Lab + Hari + Jam. **Domain-nya** adalah semua kemungkinan kombinasi tersebut. Dan **constraint-nya** adalah keempat syarat tadi (software, kapasitas, jam operasional, anti-bentrok). Sistem harus menemukan kombinasi yang lolos semua constraint — itulah yang disebut *satisficing*, yaitu menemukan solusi yang **valid**, bukan yang paling optimal."

---

## 3. Query

**Narasi untuk dosen:**

> "**Query** secara harfiah artinya **'pertanyaan' yang kita ajukan ke database**. Ketika sistem butuh data, ia mengirim query ke database, dan database menjawab dengan data yang diminta.
>
> Contoh sederhananya: *'Tampilkan semua laboratorium yang PC-nya lebih dari 30 dan statusnya aktif.'* — Itu adalah sebuah query.
>
> Dalam SIOPAL, query digunakan untuk bertanya ke database: *lab mana saja yang aktif, kapasitasnya cukup, dan punya software yang dibutuhkan?* Jawaban dari database itulah yang kemudian diproses lebih lanjut oleh sistem."

---

## 4. Filtering (Penyaringan)

**Narasi untuk dosen:**

> "**Filtering** artinya **menyaring data** — membuang yang tidak memenuhi syarat, dan hanya menyisakan yang lolos.
>
> Analoginya seperti saringan kopi. Kopi bubuk dicampur air panas, lalu disaring — yang lolos saringan adalah kopi bersih (data valid), yang tertahan adalah ampas (data yang tidak memenuhi syarat).
>
> Di SIOPAL, filtering dilakukan **bertahap** — ada 6 tahap penyaringan berurutan. Tahap pertama menyaring lab berdasarkan kapasitas, tahap kedua menyaring berdasarkan software, dan seterusnya. Setiap tahap makin mempersempit pilihan, sampai yang tersisa hanya slot jadwal yang **benar-benar valid** dan aman dari bentrokan."

---

## 5. Eloquent (Eloquent ORM)

**Narasi untuk dosen:**

> "**Eloquent** adalah **alat bawaan framework Laravel** yang memungkinkan programmer berinteraksi dengan database **tanpa menulis SQL secara langsung**. Istilahnya ORM — *Object-Relational Mapping*.
>
> Jadi daripada menulis perintah SQL mentah seperti `SELECT * FROM labs WHERE pc_siap >= 30`, kita bisa menulis dalam bahasa PHP yang lebih mudah dibaca:
>
> ```
> Laboratory::where('pc_siap', '>=', 30)->get();
> ```
>
> Keuntungannya: kode lebih **bersih**, lebih **aman** dari serangan SQL Injection, dan lebih **mudah dipelihara**. Di SIOPAL, seluruh proses filtering constraint menggunakan Eloquent — mulai dari `where()` untuk filter kapasitas, sampai `whereHas()` untuk mengecek apakah lab memiliki software yang dibutuhkan."

---

## 6. Query Filtering Eloquent (Gabungan)

**Narasi untuk dosen:**

> "**Query Filtering Eloquent** adalah **teknik inti** yang digunakan dalam penelitian ini. Sederhananya, ini adalah cara menyaring data dari database menggunakan fitur-fitur Eloquent secara **berlapis dan berurutan**.
>
> Bayangkan seperti pos pemeriksaan bertingkat. Data dari database melewati pos pertama (cek kapasitas), lalu yang lolos masuk pos kedua (cek software), yang lolos lagi masuk pos ketiga (cek bentrok), dan seterusnya — sampai 6 tahap.
>
> Yang unik di SIOPAL: filtering ini terbagi jadi **dua lapisan**:
> - **Lapisan Database** (Step 1–2): Filter dilakukan langsung di level SQL pakai `where()` dan `whereHas()` — jadi database yang bekerja keras, data yang dikirim ke PHP sudah sedikit.
> - **Lapisan Aplikasi** (Step 3–6): Filter dilakukan di PHP menggunakan Laravel Collection — untuk kalkulasi yang lebih dinamis seperti deteksi bentrok waktu dan jam istirahat.
>
> Pendekatan dua lapisan ini membuat proses **efisien** — tidak semua data perlu diproses di PHP."

---

## 7. Eager Loading

**Narasi untuk dosen:**

> "**Eager Loading** adalah teknik optimasi di Laravel untuk **mengambil data relasi sekaligus dalam satu kali pengambilan**, bukan satu per satu.
>
> Analoginya begini: bayangkan Anda ke supermarket untuk belanja 10 item. Ada dua cara:
> - ❌ **Cara malas (*Lazy Loading*)**: Pergi ke supermarket 10 kali, setiap kali hanya beli 1 item. Bolak-balik terus.
> - ✅ **Cara cerdas (*Eager Loading*)**: Pergi ke supermarket **1 kali**, beli **semua 10 item** sekaligus.
>
> Di SIOPAL, ketika kita mengambil data laboratorium, kita juga butuh data software-nya dan data prioritas prodi-nya. Dengan Eager Loading menggunakan `with(['software', 'priorityProdis'])`, semua data relasi itu diambil **sekaligus** dalam 2–3 query saja, bukan puluhan query."

---

## 8. N+1 Problem

**Narasi untuk dosen:**

> "**N+1 Problem** adalah masalah performa klasik di aplikasi web yang menggunakan ORM seperti Eloquent. Ini terjadi ketika sistem mengirim **terlalu banyak query ke database secara tidak sadar**.
>
> Contoh nyatanya: Misalnya SIOPAL punya **10 laboratorium**, dan kita ingin menampilkan daftar lab beserta software-nya. Tanpa optimasi, yang terjadi adalah:
> - **1 query** untuk mengambil 10 lab.
> - **10 query** lagi — masing-masing untuk mengambil software tiap lab.
> - Total: **1 + 10 = 11 query** — itulah N+1 Problem (N = jumlah data).
>
> Kalau lab-nya ada 100, berarti 101 query. Kalau 1000, berarti 1001 query. Ini membuat database **sangat terbebani** dan aplikasi jadi **lambat**.
>
> **Solusinya** adalah Eager Loading tadi — dengan menambahkan `with('software')`, semua data software untuk seluruh lab diambil dalam **1 query tambahan saja**. Jadi totalnya hanya **2 query**, tidak peduli berapa pun jumlah lab-nya. Ini terbukti dari penelitian Harahap (2022) — Eager Loading stabil di bawah **200 milidetik** bahkan untuk data dalam jumlah besar."

---

## Ringkasan Hubungan Antar Istilah

```
MASALAH PENJADWALAN
    │
    ▼
Dirumuskan sebagai → CSP (Constraint Satisfaction Problem)
    │                    │
    │                    └── Constraint = Syarat yang harus dipenuhi
    │
    ▼
Diselesaikan dengan → Query Filtering Eloquent (6 tahap)
    │                    │
    │                    ├── Query = Pertanyaan ke database
    │                    ├── Filtering = Penyaringan bertahap
    │                    └── Eloquent = Alat Laravel untuk akses database
    │
    ▼
Dioptimasi dengan → Eager Loading
                       │
                       └── Mencegah N+1 Problem
                           (terlalu banyak query ke database)
```

---

## Tips Menjawab Pertanyaan Dosen

| Kemungkinan Pertanyaan | Jawaban Singkat |
|----------------------|----------------|
| "Kenapa pakai Eloquent, bukan SQL biasa?" | Lebih aman (anti SQL Injection), lebih mudah dibaca, dan bisa memanfaatkan fitur ORM seperti Eager Loading |
| "Kenapa tidak pakai Algoritma Genetika?" | AG bagus untuk mencari solusi OPTIMAL, tapi kompleks. Pendekatan filtering ini lebih **pragmatis** — cukup mencari solusi yang VALID (*satisficing*), lebih cepat diimplementasikan, dan terintegrasi langsung dengan framework |
| "Apa bedanya CSP Anda dengan Backtracking?" | Backtracking mundur dan coba ulang ketika menemui jalan buntu. SIOPAL menggunakan *forward checking* — langsung eliminasi yang tidak valid di setiap tahap, tanpa perlu mundur |
| "Bagaimana memastikan tidak ada N+1?" | Menggunakan `with()` (Eager Loading) di setiap query yang melibatkan relasi, sehingga jumlah query konstan |
| "Kalau lab-nya 100, apakah tetap cepat?" | Ya, karena filtering tahap 1–2 dilakukan di level database (SQL), jadi hanya lab yang lolos yang diproses PHP. Ditambah Eager Loading, performa tetap stabil |
