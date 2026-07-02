# Daftar Pertanyaan Dosen & Jawaban Singkat — Sidang SIOPAL

> Hafalkan jawaban singkatnya saja. Jika dosen menggali, kembangkan dari poin-poin di bawahnya.

---

## A. METODE PENELITIAN (RAD)

**Q1: Kenapa pakai RAD, bukan Waterfall?**
> Waterfall terlalu kaku — kalau requirement berubah di tengah jalan, harus balik ke awal. RAD fleksibel, bisa iterasi prototipe dan dapat feedback user cepat. Beberapa aturan bisnis baru ditemukan saat pengembangan (misal: break times dinamis untuk 3 SKS), RAD bisa akomodasi itu.

**Q2: Kenapa pakai RAD, bukan Agile/Scrum?**
> Agile dirancang untuk tim besar (5-9 orang) dengan banyak ceremony (sprint planning, daily standup). Proyek ini dikerjakan 1 developer untuk 1 fitur spesifik — overhead Agile terlalu besar. RAD tetap iteratif tapi lebih ringan.

**Q3: Apa bedanya RAD dan Agile?**
> Agile fokus adaptasi terhadap perubahan requirement yang tidak terduga. RAD fokus kecepatan delivery melalui reuse komponen. Di SIOPAL, scope sudah jelas (4 constraint), yang dibutuhkan kecepatan + validasi user, bukan adaptasi radikal.

**Q4: Tahapan RAD apa saja yang dilakukan?**
> 5 tahap: (1) Business Modelling — wawancara admin lab, identifikasi 8 business rules. (2) Data Modelling — rancang ERD, relasi tabel. (3) Process Modelling — Use Case, Activity, Sequence Diagram. (4) Application Generation — coding dengan Laravel + Filament. (5) Testing & Turnover — Black Box Testing + UAT.

**Q5: RAD kan siklus singkat, berapa lama pengembangannya?**
> Sesuai literatur, RAD idealnya 30–90 hari. Pengembangan SIOPAL berjalan dalam rentang itu, dimungkinkan karena reuse komponen (Laravel, Filament, Livewire) sehingga tidak coding dari nol.

---

## B. TEKNIS (ELOQUENT, CSP, FILTERING)

**Q6: Apa itu CSP (Constraint Satisfaction Problem)?**
> Masalah di mana kita harus mencari solusi yang memenuhi semua batasan sekaligus. Seperti Sudoku — angka harus unik per baris, kolom, kotak. Di SIOPAL, variabelnya Lab+Hari+Jam, constraint-nya 6 (kapasitas, software, anti-bentrok, sesi, break times, prioritas).

**Q7: Kenapa pakai Eloquent Filtering, bukan Algoritma Genetika?**
> Algoritma Genetika bagus untuk mencari solusi OPTIMAL, tapi kompleks implementasinya. Pendekatan ini lebih pragmatis — cukup mencari solusi VALID (satisficing), lebih cepat diimplementasikan, dan terintegrasi langsung dengan framework Laravel. Untuk skala lab UDINUS, pendekatan ini sudah cukup efisien.

**Q8: Apa kelebihan pendekatan ini dibanding backtracking?**
> Backtracking mundur dan coba ulang ketika menemui jalan buntu. SIOPAL pakai forward checking — langsung eliminasi yang tidak valid di setiap tahap, tanpa perlu mundur. Lebih sederhana dan cepat untuk skala constraint yang ada.

**Q9: Jelaskan 6 tahap filtering-nya!**
> (1) Filter lab aktif + kapasitas PC ≥ jumlah siswa. (2) Filter lab yang punya semua software yang dibutuhkan matkul. (3) Deteksi slot yang sudah terisi, cek slot berturutan kosong. (4) Filter berdasarkan sesi (pagi/siang/malam). (5) Eliminasi slot yang melewati jam istirahat. (6) Urutkan lab prioritas prodi di atas.

**Q10: Apa itu N+1 Problem dan bagaimana mengatasinya?**
> Masalah ketika sistem mengirim terlalu banyak query ke database. Contoh: 10 lab → 1 query ambil lab + 10 query ambil software masing-masing = 11 query. Solusinya pakai Eager Loading (`with()`) — semua data relasi diambil sekaligus, jadi cuma 2 query, tidak peduli berapa pun jumlah lab-nya.

**Q11: Di mana Eager Loading diterapkan di kode?**
> Di `ScheduleWizard.php` line 268: `->with(['priorityProdis', 'kategori'])` saat ambil data lab, dan di `SchedulingService.php` line 241: `->with('timeSlot')` saat ambil jadwal yang sudah ada.

**Q12: Kenapa filtering dibagi 2 lapisan (Database + PHP)?**
> Lapisan database (Step 1-2) menyaring dengan SQL, jadi data yang dikirim ke PHP sudah sedikit — lebih efisien. Lapisan PHP (Step 3-6) untuk kalkulasi dinamis yang sulit dilakukan di SQL murni, seperti deteksi overlap waktu dan break times.

**Q13: Apa itu overlap detection di break times?**
> Formula: `start < breakEnd AND end > breakStart`. Jika jadwal mulai 14:10 dan selesai 16:40, tapi break sore 15:00-15:30 — karena 14:10 < 15:30 DAN 16:40 > 15:00, maka ada overlap → slot ditolak.

**Q14: Apa itu double-check konflik?**
> Saat user klik kartu rekomendasi, sistem cek ulang sekali lagi ke database sebelum simpan. Ini untuk mencegah race condition — kalau ada admin lain yang sudah booking slot itu di antara waktu pencarian dan konfirmasi.

**Q15: Kenapa pakai Laravel, bukan framework lain?**
> Laravel punya Eloquent ORM yang mendukung query filtering berlapis, Eager Loading untuk performa, dan ekosistem yang matang (Filament untuk admin panel, Livewire untuk interaktivitas real-time). Semuanya terintegrasi dan mempercepat pengembangan sesuai prinsip RAD.

**Q16: Apa peran Filament dalam sistem ini?**
> Filament adalah admin panel builder untuk Laravel. Dipakai untuk membangun antarmuka CRUD (lab, matkul, jadwal) dan halaman Schedule Wizard dengan cepat tanpa menulis HTML/CSS dari nol. Ini sesuai prinsip RAD yang menekankan reuse komponen.

**Q17: Apa peran Livewire?**
> Livewire membuat formulir menjadi reaktif tanpa reload halaman. Contoh: ketika admin pilih Prodi, daftar Mata Kuliah otomatis diperbarui hanya menampilkan matkul prodi itu. Ini pakai properti `live()` di Filament Form Builder.

---

## C. IMPLEMENTASI FITUR

**Q18: Jelaskan fitur import massal!**
> Admin upload Excel berisi daftar matkul + jumlah kelompok. Sistem membaca semua baris, expand jadi entri individual, urutkan berdasarkan SKS menurun (matkul sulit duluan), lalu cari slot pakai triple nested loop (Hari × Slot × Lab). Slot yang ditemukan ditandai in-memory supaya tidak bentrok antar baris.

**Q19: Kenapa matkul SKS tinggi diproses duluan di import?**
> Ini heuristik MCV (Most Constrained Variable) dari CSP. Matkul 3 SKS butuh 3 slot berturutan — lebih sulit ditempatkan. Kalau diproses duluan, peluang keberhasilannya lebih tinggi karena slot masih banyak yang kosong.

**Q20: Apa itu in-memory tracking?**
> Array PHP `$usedSlotNumbers` yang menyimpan slot yang sudah dipakai. Tanpa ini, setiap pemeriksaan butuh query ke database — bisa ribuan query. Dengan ini, cukup query sekali per kombinasi lab+hari, sisanya cek dari memory. Dari potensi 2500+ query jadi cuma puluhan.

**Q21: Apa bedanya input satuan dan import massal?**
> Input satuan: admin isi formulir per matkul → dapat kartu rekomendasi → pilih satu. Import massal: upload Excel ratusan matkul → sistem otomatis tempatkan semua → tampilkan preview (OK/Warning/Error) → admin konfirmasi.

**Q22: Apa perbedaan status OK, Warning, dan Error di import?**
> OK (hijau) = berhasil ditempatkan, data sesuai. Warning (kuning) = berhasil ditempatkan, tapi ada ketidaksesuaian data (misal SKS di Excel beda dengan database). Error (merah) = gagal, tidak ada slot yang tersedia.

**Q23: Bagaimana break times dinamis bekerja?**
> Default: break sore 15:50-16:20. Tapi untuk matkul 3 SKS sesi siang, break sore digeser ke 15:00-15:30 agar slot 15:30 bisa dipakai (15:30 + 150 menit = 18:00, pas sebelum break malam). Ini melalui method `getBreakTimes()` yang cek SKS dan sesi.

**Q24: Bagaimana sistem mencegah jadwal bentrok?**
> 3 lapis perlindungan: (1) Step 3 — slot yang sudah terisi dikecualikan dari rekomendasi. (2) Double-check — saat klik kartu, cek ulang ke database sebelum simpan. (3) Import massal — pakai in-memory tracking supaya antar baris Excel tidak saling bentrok.

---

## D. DATA & ARSITEKTUR

**Q25: Kenapa pakai tabel pivot (many-to-many)?**
> Karena relasinya memang M:N. Satu lab bisa punya banyak software, satu software bisa ada di banyak lab → `lab_software`. Satu matkul butuh banyak software, satu software bisa dibutuhkan banyak matkul → `course_software`. Tabel pivot memodelkan ini secara akurat dan normal (3NF).

**Q26: Entitas utama apa saja di database?**
> Laboratorium, Course (Mata Kuliah), Software, Schedule (Jadwal), TimeSlot, Prodi, Lecturer (Dosen), AcademicPeriod. Plus tabel pivot: lab_software, course_software, lab_prodi_priority.

**Q27: Kenapa pakai time slot berbasis nomor, bukan waktu langsung?**
> Slot bernomor (1, 2, 3...) memudahkan pengecekan slot berturutan. Untuk matkul 3 SKS, cukup cek slot N, N+1, N+2 — tanpa perlu kalkulasi waktu yang rumit. Setiap slot = 50 menit.

---

## E. PENGUJIAN

**Q28: Berapa total skenario pengujian?**
> 30 total: 22 skenario Black Box Testing (6 fungsionalitas antarmuka + 8 validasi constraint + 4 import massal + 4 edge cases) + 8 uji algoritma penjadwalan. Semua 100% Valid.

**Q29: Contoh edge case yang diuji?**
> (1) Double-click kartu → hanya 1 jadwal tersimpan. (2) Lab non-aktif → tidak muncul di rekomendasi. (3) Excel kosong → notifikasi "tidak ada data". (4) Matkul tanpa prodi → rekomendasi muncul tanpa indikator bintang.

**Q30: Berapa skor UAT dan artinya?**
> 92,8% dari 35 responden — kategori Sangat Layak (81-100%). Efisiensi tertinggi di 93,0%, artinya pengguna merasakan pengurangan waktu penyusunan jadwal yang signifikan dibanding manual.

**Q31: Siapa saja responden UAT?**
> 35 orang: Staff Laboratorium (admin/laboran) dan Non-Lab (dosen/kaprodi yang menerima output jadwal). Semua dari lingkungan FIK UDINUS.

**Q32: Aspek UAT apa yang skornya paling tinggi?**
> Efisiensi (93,0%) — pengguna sangat merasakan bahwa penjadwalan otomatis jauh lebih cepat daripada cara manual pakai spreadsheet.

**Q33: Aspek UAT apa yang skornya paling rendah?**
> Keandalan (92,4%) — meskipun tetap Sangat Layak, ini aspek terendah. Kemungkinan karena beberapa responden belum sepenuhnya percaya sistem bisa 100% bebas bentrok. Tapi secara teknis, Black Box Testing membuktikan 100% valid.

**Q34: Kenapa tidak pakai White Box Testing?**
> Black Box Testing lebih relevan karena fokus penelitian adalah validasi fungsionalitas dari sisi pengguna — apakah output sesuai ekspektasi. White Box Testing menguji struktur kode internal, yang lebih cocok untuk proyek yang fokus pada code coverage atau keamanan.

---

## F. BATASAN & SARAN

**Q35: Kenapa tidak mempertimbangkan konflik jadwal dosen?**
> Karena fokus penelitian ini pada constraint penjadwalan laboratorium (software, kapasitas, waktu). Konflik jadwal dosen memerlukan integrasi dengan sistem akademik lain (SIAKAD) yang di luar scope. Ini jadi saran pengembangan selanjutnya.

**Q36: Apakah sistemnya optimal?**
> Sistem ini satisficing, bukan optimizing. Artinya mencari solusi yang VALID (memenuhi semua constraint), bukan yang paling optimal. Untuk optimasi global (misal utilisasi lab tertinggi), perlu algoritma yang lebih kompleks seperti Genetic Algorithm. Ini jadi saran di Bab V.

**Q37: Kalau lab-nya sangat banyak, apakah tetap cepat?**
> Ya, karena Step 1-2 menyaring di level database (SQL), jadi hanya lab yang lolos yang diproses PHP. Ditambah Eager Loading, performa stabil. Untuk skala ekstrem, bisa ditambah indexing database dan caching.

**Q38: Apa saran pengembangan selanjutnya?**
> 4 saran: (1) Algoritma heuristik (Genetic Algorithm/Simulated Annealing) untuk dataset besar. (2) Integrasi Google Calendar + notifikasi WhatsApp. (3) Modul pencocokan asisten lab. (4) Analisis utilitas ruang berbasis data pemakaian.

**Q39: Kenapa hanya admin yang bisa akses, bukan dosen/mahasiswa?**
> Karena ini dirancang sebagai alat bantu admin di panel admin SIOPAL, bukan portal penjadwalan publik. Admin yang bertanggung jawab atas alokasi lab. Dosen/mahasiswa menerima output jadwal yang sudah final.

**Q40: Bagaimana kalau ada 2 admin mengakses bersamaan?**
> Ada mekanisme double-check (race condition prevention). Saat admin A klik kartu, sistem cek ulang ke database sebelum simpan. Kalau admin B sudah booking slot itu, admin A dapat notifikasi "Slot sudah terisi" dan rekomendasi di-refresh otomatis.

---

## G. PERTANYAAN JEBAKAN

**Q41: Kamu bilang 100% valid, apa benar tidak ada bug?**
> Yang dimaksud 100% valid adalah dari 30 skenario pengujian yang dirancang, semua menghasilkan output sesuai ekspektasi. Tentu saja, pengujian tidak bisa menjamin zero-bug secara absolut, tapi skenario sudah mencakup fungsionalitas, constraint, import, dan edge cases.

**Q42: Kalau semua lab penuh, apa yang terjadi?**
> Sistem menampilkan notifikasi "Tidak ada slot tersedia" beserta alasan spesifik (misal "Lab dengan kapasitas ≥ 999 PC tidak ditemukan"). Di import massal, baris yang gagal berstatus Error (merah) dengan pesan alasan kegagalan.

**Q43: Kontribusi penelitian ini apa?**
> (1) Studi kasus praktis penerapan CSP di dunia nyata (penjadwalan lab). (2) Referensi teknis implementasi Eloquent Query Filtering berlapis untuk masalah logis kompleks — di luar operasi CRUD standar. (3) Bukti bahwa pendekatan filtering sederhana bisa efektif tanpa algoritma heuristik berat.

**Q44: Apa perbedaan penelitian ini dengan penelitian sebelumnya?**
> Mulyono (2022) buat SI manajemen lab tapi belum otomatisasi penjadwalan. Wulandari (2022) pakai Backtracking tapi kompleks. Penelitian ini mengisi celah: otomatis + efisien + terintegrasi framework, tanpa perlu algoritma heuristik berat. Pendekatan Query Filtering Eloquent ini belum pernah digunakan untuk CSP penjadwalan.

**Q45: State-of-the-art atau novelty-nya apa?**
> Novelty-nya ada 3: (1) Pendekatan layered filtering (Database Layer + Application Layer) untuk CSP. (2) Break times dinamis yang menyesuaikan SKS dan sesi. (3) In-memory tracking pada import massal untuk mencegah bentrok antar baris tanpa query berulang.
