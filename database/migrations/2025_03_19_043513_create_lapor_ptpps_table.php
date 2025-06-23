<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lapor_ptpps', function (Blueprint $table) {
            $table->id();
            // $table->string('ptpp');
            $table->text('nomor_sop');
            $table->text('ketidaksesuaian');
            $table->string('lokasi');
            $table->date('tgl_kejadian');
            $table->time('jam_kejadian');
            $table->date('tgl_laporan');
            $table->time('jam_laporan');
            $table->text('hasil_pengamatan');
            $table->text('tindakan_langsung');
            $table->text('permintaan_perbaikan');
            $table->string('nama_pelapor');
            $table->string('bagian_pelapor');
            $table->string('jabatan_pelapor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_ptpps');
    }
};
