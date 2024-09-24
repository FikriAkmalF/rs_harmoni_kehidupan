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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->string('no_bpjs');
            $table->string('no_hp');
            $table->string('gender');
            $table->string('email');
            $table->string('nama_obat');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('tanggal_lahir');
            $table->string('gol_darah');
            $table->string('alamat');
            $table->string('tanggal_pemeriksaan');
            $table->string('dokter');
            $table->string('catatan_dokter');
            $table->enum('status', ['Lunas', 'Belum lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
