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
        Schema::table('software_details', function (Blueprint $table) {
            $table->string('jenis_lisensi')->nullable()->after('keterangan');
            $table->string('nomor_lisensi')->nullable()->after('jenis_lisensi');
            $table->date('tanggal_kadaluarsa')->nullable()->after('nomor_lisensi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('software_details', function (Blueprint $table) {
            $table->dropColumn(['jenis_lisensi', 'nomor_lisensi', 'tanggal_kadaluarsa']);
        });
    }
};
