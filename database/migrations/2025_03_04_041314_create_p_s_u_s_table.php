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
        Schema::create('p_s_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();
            $table->string('merk');               // Contoh: Corsair, Seasonic
            $table->string('tipe')->nullable();   // Contoh: RM750x, bisa nullable
            $table->integer('daya');
            $table->string('efisiensi');
            $table->tinyInteger('bulan');
            $table->unsignedInteger('stok')->default(0);
            $table->string('full_name')->virtualAs('concat(merk,\'-\',tipe, \'-\',daya)');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_s_u_s');
    }
};
