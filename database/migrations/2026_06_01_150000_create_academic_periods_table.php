<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Membuat tabel master periode akademik (Tahun Ajaran + Semester).
     * Hanya boleh ada 1 periode aktif pada satu waktu.
     */
    public function up(): void
    {
        Schema::create('academic_periods', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran', 9); // Format: "2025/2026"
            $table->enum('semester', ['ganjil', 'genap']);
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            // Unique constraint: satu tahun ajaran hanya punya 1 ganjil dan 1 genap
            $table->unique(['tahun_ajaran', 'semester']);
        });

        // Buat periode default berdasarkan bulan saat ini
        $now = now();
        $month = $now->month;
        $year = $now->year;

        // Semester Ganjil: Aug-Jan, Semester Genap: Feb-Jul
        if ($month >= 8) {
            // Ganjil: tahun_ajaran = "YYYY/(YYYY+1)"
            $tahunAjaran = $year . '/' . ($year + 1);
            $semester = 'ganjil';
        } elseif ($month >= 2) {
            // Genap: tahun_ajaran = "(YYYY-1)/YYYY"
            $tahunAjaran = ($year - 1) . '/' . $year;
            $semester = 'genap';
        } else {
            // Januari masih Ganjil semester sebelumnya
            $tahunAjaran = ($year - 1) . '/' . $year;
            $semester = 'ganjil';
        }

        \DB::table('academic_periods')->insert([
            'tahun_ajaran' => $tahunAjaran,
            'semester' => $semester,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_periods');
    }
};
