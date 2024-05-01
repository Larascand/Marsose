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
        Schema::create('surat', function (Blueprint $table) {
            $table->bigIncrements('ID_Surat');
            $table->string('jenis_surat', 100)->nullable();
            $table->string('nama_surat', 100)->nullable();
            $table->string('file_surat', 255)->nullable();
            $table->string('alur_pengurusan', 255)->nullable();
            $table->string('No_RW', 20)->nullable();
            $table->timestamps();
            
            // Menambahkan indeks dan foreign key
            $table->foreign('No_RW')->references('No_RW')->on('data_rw')->onDelete('cascade');
            $table->foreign('jenis_surat')->references('jenis_surat')->on('kategori_surat')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
