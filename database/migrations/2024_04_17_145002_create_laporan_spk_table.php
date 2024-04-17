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
        Schema::create('laporan_spk', function (Blueprint $table) {
            $table->bigIncrements('ID_SPK');
            $table->string('jenis_laporan', 100)->nullable();
            $table->integer('biaya')->nullable();
            $table->integer('dampak')->nullable();
            $table->integer('durasi_pekerjaan')->nullable();
            $table->integer('jumlah_pengaduan')->nullable();
            $table->string('No_RW', 10)->nullable();
            $table->timestamps();
            
            // Menambahkan indeks dan foreign key
            $table->foreign('No_RW')->references('No_RW')->on('data_rw')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_spk');
    }
};
