# Peta Kode 6 Tahap Filtering — SIOPAL

> Dokumen ini menunjukkan **di mana tepatnya** setiap tahap filtering diimplementasikan dalam kode.
> Ada 2 file utama yang bekerja sama:

| File | Peran |
|------|-------|
| [SchedulingService.php](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php) | **Core logic** — filter kapasitas, software, deteksi konflik |
| [ScheduleWizard.php](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php) | **Orkestrator** — memanggil service, filter sesi, break times, sort prioritas |

---

## Alur Pemanggilan

```
User klik "Cari Slot Tersedia"
    │
    ▼
ScheduleWizard::findAvailableSlots()     ← LINE 212
    │
    ├── STEP 1: Filter Lab Aktif + Kapasitas   ← LINE 266-269
    ├── STEP 2: Filter Software                ← LINE 272-283
    │
    │   foreach (hari × lab):
    │       │
    │       ├── STEP 3: SchedulingService::getAvailableSlots()  ← LINE 291
    │       ├── STEP 4: Filter Sesi Waktu      ← LINE 294-297
    │       ├── STEP 5: Filter Break Times      ← LINE 304-322
    │       └── STEP 6: Sort Prioritas          ← LINE 347-352
    │
    └── Tampilkan kartu rekomendasi
```

---

## STEP 1 — Filter Lab Aktif & Kapasitas

> **Lapisan:** Database (SQL)
> **Teknik:** Eloquent `where()`

### 📍 Lokasi: [ScheduleWizard.php L266-269](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L266-L269)

```php
// Get all labs with enough capacity for jumlah_siswa
$availableLabs = Laboratorium::where('is_active', true)
    ->where('pc_siap', '>=', $jumlahSiswa)
    ->with(['priorityProdis', 'kategori'])  // ← Eager Loading (mencegah N+1)
    ->get();
```

**Penjelasan:**
- `where('is_active', true)` → Hanya lab yang statusnya aktif
- `where('pc_siap', '>=', $jumlahSiswa)` → Kapasitas PC harus ≥ jumlah mahasiswa
- `with(['priorityProdis', 'kategori'])` → **Eager Loading** — ambil relasi sekaligus

### Versi alternatif di SchedulingService (method `getAvailableLabs`):
📍 [SchedulingService.php L128-165](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L128-L165)

```php
$query = Laboratorium::where('is_active', true);

if ($studentCount > 0) {
    $query->where('pc_siap', '>=', $studentCount);
}
```

---

## STEP 2 — Filter Ketersediaan Software

> **Lapisan:** Database + PHP
> **Teknik:** Eloquent `whereHas()` + Collection `filter()`

### 📍 Lokasi: [ScheduleWizard.php L272-283](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L272-L283)

```php
// Filter labs that have required software (from inventory)
$requiredSoftwareIds = $course->requiredSoftware()->pluck('software_details.id')->toArray();
if (!empty($requiredSoftwareIds)) {
    $requiredCount = count($requiredSoftwareIds);
    $availableLabs = $availableLabs->filter(function ($lab) use ($requiredSoftwareIds, $requiredCount) {
        // Get software IDs from lab's inventory
        $labSoftwareIds = \App\Models\Inventory::where('laboratorium_id', $lab->id)
            ->where('inventoriable_type', \App\Models\SoftwareDetail::class)
            ->pluck('inventoriable_id')
            ->toArray();
        $matchCount = count(array_intersect($requiredSoftwareIds, $labSoftwareIds));
        return $matchCount >= $requiredCount;  // Lab harus punya SEMUA software
    });
}
```

**Penjelasan:**
- Ambil daftar software yang dibutuhkan mata kuliah
- Untuk setiap lab, cek apakah lab memiliki **semua** software tersebut
- `array_intersect()` menghitung berapa software yang cocok
- Lab hanya lolos jika `matchCount >= requiredCount`

### Versi alternatif di SchedulingService (menggunakan `whereHas`):
📍 [SchedulingService.php L145-152](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L145-L152)

```php
if (!empty($requiredSoftwareIds)) {
    $requiredCount = count($requiredSoftwareIds);
    // Lab harus memiliki SEMUA software yang dibutuhkan
    $query->whereHas('software', function ($q) use ($requiredSoftwareIds) {
        $q->whereIn('software_details.id', $requiredSoftwareIds);
    }, '>=', $requiredCount);
}
```

---

## STEP 3 — Deteksi Konflik Jadwal (Anti-Bentrok)

> **Lapisan:** Database + PHP Loop
> **Teknik:** Eloquent `where()` + `for` loop

### 📍 Lokasi: [SchedulingService.php L176-223](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L176-L223)

**Sub-step 3a — Ambil slot yang sudah terisi:**
📍 [SchedulingService.php L233-272](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L233-L272)

```php
public function getOccupiedSlotNumbers(int $labId, string $day, ...): array
{
    $schedules = Schedule::where('laboratorium_id', $labId)
        ->where('day', $day)
        ->when($academicPeriodId, fn($q) => $q->where('academic_period_id', $academicPeriodId))
        ->with('timeSlot')   // ← Eager Loading
        ->get();

    $occupiedNumbers = [];
    foreach ($schedules as $schedule) {
        $startNumber = $schedule->timeSlot->slot_number;
        $duration = $schedule->duration_slots ?? 1;
        for ($i = 0; $i < $duration; $i++) {
            $occupiedNumbers[] = $startNumber + $i;  // Semua slot yang ditempati
        }
    }
    return array_unique($occupiedNumbers);
}
```

**Sub-step 3b — Filter slot berturutan yang kosong:**
📍 [SchedulingService.php L204-222](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L204-L222)

```php
return $allSlots->filter(function ($slot) use ($allSlots, $occupiedSlotNumbers, $slotsNeeded) {
    // Cek apakah slot ini DAN slot-slot berikutnya tersedia
    for ($i = 0; $i < $slotsNeeded; $i++) {
        $checkSlotNumber = $slot->slot_number + $i;

        // Pastikan slot dengan nomor tersebut ada
        $slotExists = $allSlots->contains('slot_number', $checkSlotNumber);
        if (!$slotExists) return false;  // Melebihi jam operasional

        // Pastikan slot tidak ditempati
        if (in_array($checkSlotNumber, $occupiedSlotNumbers)) {
            return false;  // ← BENTROK! Eliminasi.
        }
    }
    return true;  // ← Semua slot berturutan kosong ✅
})->values();
```

**Penjelasan:**
- Jika matkul 3 SKS → butuh 3 slot berturutan
- Sistem cek slot N, N+1, N+2 — kalau **salah satu** sudah terisi → gagal
- Ini yang mencegah bentrokan jadwal

### Dipanggil dari ScheduleWizard:
📍 [ScheduleWizard.php L291](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L291)

```php
$availableSlots = $service->getAvailableSlots($lab, $day, $course->sks);
```

---

## STEP 4 — Filter Sesi Waktu

> **Lapisan:** Aplikasi (PHP)
> **Teknik:** Collection `filter()`

### 📍 Lokasi: [ScheduleWizard.php L251-297](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L251-L297)

```php
// Define session time ranges
$sessionTimes = [
    'pagi'  => ['start' => '07:00', 'end' => '12:20'],   // Pagi
    'siang' => ['start' => '12:30', 'end' => '18:20'],   // Siang
    'malam' => ['start' => '18:30', 'end' => '22:00'],   // Malam
];

$sessionRange = $sessionTimes[$sesi] ?? $sessionTimes['pagi'];

// ...

// Filter slots by session time range
$filteredSlots = $availableSlots->filter(function ($slot) use ($sessionRange) {
    $slotStartTime = Carbon::parse($slot->start_time)->format('H:i');
    return $slotStartTime >= $sessionRange['start']
        && $slotStartTime < $sessionRange['end'];
});
```

**Penjelasan:**
- User memilih sesi "Pagi" → hanya slot 07:00–12:20 yang ditampilkan
- User memilih sesi "Malam" → hanya slot 18:30+ yang ditampilkan
- Slot di luar rentang sesi langsung **dieliminasi**

---

## STEP 5 — Eliminasi Break Times (Jam Istirahat)

> **Lapisan:** Aplikasi (PHP)
> **Teknik:** Collection `filter()` + Overlap Detection

### 📍 Konfigurasi Break Times: [SchedulingService.php L27-57](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L27-L57)

```php
public const DEFAULT_BREAKS = [
    ['start' => '12:00', 'end' => '12:30'], // Istirahat siang
    ['start' => '15:50', 'end' => '16:20'], // Istirahat sore
    ['start' => '18:00', 'end' => '18:30'], // Istirahat malam
];

public const BREAKS_3SKS_SIANG = [
    ['start' => '12:00', 'end' => '12:30'], // Istirahat siang
    ['start' => '15:00', 'end' => '15:30'], // Istirahat sore (DIGESER!)
    ['start' => '18:00', 'end' => '18:30'], // Istirahat malam
];

// Pilih konfigurasi yang tepat
public static function getBreakTimes(int $sks = 2, ?string $sesi = null): array
{
    if ($sks >= 3 && $sesi === 'siang') {
        return self::BREAKS_3SKS_SIANG;  // Break sore digeser untuk 3+ SKS
    }
    return self::DEFAULT_BREAKS;
}
```

### 📍 Overlap Detection: [ScheduleWizard.php L299-322](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L299-L322)

```php
// Use dynamic breaks based on SKS + sesi
$breakTimes = SchedulingService::getBreakTimes($course->sks, $sesi);

// Filter out slots that overlap with break times
$filteredSlots = $filteredSlots->filter(function ($slot) use ($service, $course, $breakTimes, $maxEndTime) {
    $slotStart = Carbon::parse($slot->start_time)->format('H:i');
    $slotEnd = $service->calculateEndTime($slot, $course->sks);

    // Check if slot ends after max time (21:00)
    if ($slotEnd > $maxEndTime) {
        return false;
    }

    // Check if slot overlaps with any break time
    foreach ($breakTimes as $break) {
        // ★ Formula Overlap Detection:
        // Tumpang tindih terjadi jika: Start < BreakEnd AND End > BreakStart
        if ($slotStart < $break['end'] && $slotEnd > $break['start']) {
            return false;  // ← MELEWATI JAM ISTIRAHAT! Eliminasi.
        }
    }

    return true;
});
```

**Penjelasan:**
- Matkul 3 SKS = 150 menit. Jika mulai 14:10, selesai 16:40 → melewati break 15:00–15:30 → **DITOLAK**
- Jika mulai 15:30, selesai 18:00 → tidak melewati break → **LOLOS** ✅
- Formula: `start < breakEnd AND end > breakStart` = ada overlap

---

## STEP 6 — Sort Prioritas Lab-Prodi

> **Lapisan:** Aplikasi (PHP)
> **Teknik:** `usort()` — sorting 2 kriteria

### 📍 Lokasi: [ScheduleWizard.php L324-352](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L324-L352)

```php
// Cek apakah lab ini prioritas untuk prodi matkul
$isPriority = $course->prodi_id
    ? $lab->priorityProdis->contains('id', $course->prodi_id)
    : false;

// ...

// Sort: priority first, then by start time
usort($dayRecommendations, function ($a, $b) {
    // Kriteria 1: Lab prioritas prodi di atas (⭐)
    if ($a['is_priority'] !== $b['is_priority']) {
        return $b['is_priority'] <=> $a['is_priority'];
    }
    // Kriteria 2: Waktu mulai paling awal di atas
    return $a['slot_number'] <=> $b['slot_number'];
});
```

**Penjelasan:**
- Lab yang merupakan **prioritas untuk prodi** mata kuliah → ditampilkan **di atas** (dengan ⭐)
- Jika sama-sama prioritas (atau sama-sama bukan), diurutkan berdasarkan **waktu mulai paling awal**

---

## BONUS — Double-Check Konflik (Anti Race Condition)

> Saat user klik kartu rekomendasi, sistem cek ulang **sekali lagi** sebelum simpan.

### 📍 Lokasi: [ScheduleWizard.php L410-421](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L410-L421)

```php
// Double-check for conflicts
if ($service->hasConflict($labId, $this->selectedDay, $slotId, $course->sks)) {
    Notification::make()
        ->title('Slot sudah terisi!')
        ->body('Jadwal bentrok dengan yang sudah ada. Silakan pilih slot lain.')
        ->danger()
        ->send();

    // Refresh recommendations
    $this->findAvailableSlots();
    return;
}
```

### Method `hasConflict()`: [SchedulingService.php L284-307](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L284-L307)

```php
public function hasConflict(...): bool
{
    $occupiedNumbers = $this->getOccupiedSlotNumbers($labId, $day, ...);

    for ($i = 0; $i < $slotsNeeded; $i++) {
        if (in_array($startSlot->slot_number + $i, $occupiedNumbers)) {
            return true;  // ← ADA KONFLIK!
        }
    }
    return false;
}
```

---

## Ringkasan: Peta Step → File → Line

| Step | Constraint | File | Lines | Teknik |
|:----:|-----------|------|:-----:|--------|
| **1** | Kapasitas Lab | ScheduleWizard.php | [L266-269](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L266-L269) | `where('pc_siap', '>=')` |
| **2** | Software | ScheduleWizard.php | [L272-283](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L272-L283) | `filter()` + `array_intersect` |
| **3** | Anti-Bentrok | SchedulingService.php | [L176-272](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Services/SchedulingService.php#L176-L272) | `where()` + `for` loop |
| **4** | Sesi Waktu | ScheduleWizard.php | [L294-297](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L294-L297) | Collection `filter()` |
| **5** | Break Times | ScheduleWizard.php | [L304-322](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L304-L322) | `filter()` + overlap formula |
| **6** | Prioritas | ScheduleWizard.php | [L347-352](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L347-L352) | `usort()` 2 kriteria |
| **✓** | Double-check | ScheduleWizard.php | [L410-421](file:///Users/dimasdaffa/Documents/laravellas/SIOPAL-UDINUS2/app/Filament/Pages/ScheduleWizard.php#L410-L421) | `hasConflict()` |
