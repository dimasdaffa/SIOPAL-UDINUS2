<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menambahkan foreign key academic_period_id ke schedules.
     * Data existing di-assign ke periode aktif saat ini.
     */
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreignId('academic_period_id')
                ->nullable()
                ->after('id')
                ->constrained('academic_periods')
                ->onDelete('cascade');
        });

        // Assign semua jadwal existing ke periode aktif saat ini
        $activePeriod = \DB::table('academic_periods')
            ->where('is_active', true)
            ->first();

        if ($activePeriod) {
            \DB::table('schedules')
                ->whereNull('academic_period_id')
                ->update(['academic_period_id' => $activePeriod->id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['academic_period_id']);
            $table->dropColumn('academic_period_id');
        });
    }
};
