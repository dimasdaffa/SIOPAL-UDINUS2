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
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();
            $table->string('merk');
            $table->string('nama');
            $table->string('resolusi');
            $table->string('ukuran');
            $table->string('spesifikasi');
            $table->year('tahun');
            $table->tinyInteger('bulan');
            $table->unsignedInteger('stok')->default(0);
            $table->string('full_name')->virtualAs('concat(merk,\'-\',nama, \'-\',ukuran,\'inch\')');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitors');
    }
};
