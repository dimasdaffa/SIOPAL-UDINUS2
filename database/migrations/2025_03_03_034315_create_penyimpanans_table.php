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
        Schema::create('penyimpanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();
            $table->string('merk');
            $table->enum('tipe', ['SSD', 'HDD']);
            $table->integer('kapasitas');
            $table->string('spesifikasi')->nullable();
            $table->tinyInteger('bulan');
            $table->unsignedInteger('stok')->default(0);
            $table->year('tahun');
            $table->string('full_name')->virtualAs('concat(tipe,\'-\',merk, \'-\',kapasitas,\'GB\')');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyimpanans');
    }
};
