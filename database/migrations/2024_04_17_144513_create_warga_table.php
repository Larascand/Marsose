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
        Schema::create('warga', function (Blueprint $table) {
            $table->bigIncrements('NIK');
            $table->string('username', 20)->nullable();
            $table->string('password', 20)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('No_KK', 20)->nullable();
            $table->timestamps();
            
            // Menambahkan indeks dan foreign key
            $table->foreign('No_KK')->references('No_KK')->on('kk')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
