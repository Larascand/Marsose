<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('laporan_pengaduan', function (Blueprint $table) {
        $table->increments('ID_Laporan');
        $table->date('tanggal_laporan')->nullable();
        $table->string('jenis_laporan', 100)->nullable();
        $table->string('gambar', 255)->nullable();
        $table->string('keterangan', 255)->nullable();
        $table->enum('status', ['ditolak', 'diterima', 'selesai'])->nullable();
        $table->unsignedBigInteger('NIK')->nullable();
        $table->string('No_RW', 10)->nullable();

        $table->foreign('NIK')->references('NIK')->on('warga')->onDelete('set null');
        $table->foreign('No_RW')->references('No_RW')->on('data_rw')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengaduan');
    }
};
