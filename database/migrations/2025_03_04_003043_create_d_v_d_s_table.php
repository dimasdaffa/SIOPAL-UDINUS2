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
        Schema::create('d_v_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();
            $table->string('dvd');
            $table->string('merk');
            $table->string('spesifikasi');
            $table->year('tahun');
            $table->tinyInteger('bulan');
            $table->unsignedInteger('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_v_d_s');
    }
};
