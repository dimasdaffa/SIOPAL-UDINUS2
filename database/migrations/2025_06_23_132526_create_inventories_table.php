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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laboratorium_id')->constrained('laboratoria')->onDelete('cascade');
            $table->string('kode_inventaris')->unique();
            $table->string('nama_barang')->nullable();
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Dalam Perbaikan'])->default('Baik');
            $table->date('tanggal_pengadaan')->nullable();

            // Kolom polimorfik untuk menautkan ke tabel detail (pc_details, non_pc_details, dll.)
            $table->unsignedBigInteger('inventoriable_id');
            $table->string('inventoriable_type');

            $table->timestamps();

            // Index untuk kolom polimorfik
            $table->index(['inventoriable_id', 'inventoriable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
