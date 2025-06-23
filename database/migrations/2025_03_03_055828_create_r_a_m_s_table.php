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
        Schema::create('r_a_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();
            $table->string('merk');
            $table->string('tipe');
            $table->integer('kapasitas');
            $table->year('tahun');
            $table->tinyInteger('bulan');
            $table->unsignedInteger('stok')->default(0);
            $table->string('full_name')->virtualAs('concat(merk,\'-\',tipe, \'-\',kapasitas,\'GB\')');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_a_m_s');
    }
};
