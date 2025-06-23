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
        Schema::create('p_c_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('no_inventaris')->unique();

            // Menggunakan foreignId()->constrained() dengan onDelete('cascade')
            $table->foreignId('motherboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('processor_id')->constrained()->onDelete('cascade');
            $table->foreignId('penyimpanan_id')->constrained('penyimpanans')->onDelete('cascade');
            $table->foreignId('vga_id')->constrained('v_g_a_s')->onDelete('cascade');
            $table->foreignId('ram_id')->constrained('r_a_m_s')->onDelete('cascade');
            $table->foreignId('dvd_id')->nullable()->constrained('d_v_d_s')->onDelete('cascade');
            $table->foreignId('keyboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('mouse_id')->constrained('mice')->onDelete('cascade');
            $table->foreignId('monitor_id')->constrained()->onDelete('cascade');
            $table->foreignId('headphone_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('psu_id')->constrained('p_s_u_s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_c_inventories');
    }
};
