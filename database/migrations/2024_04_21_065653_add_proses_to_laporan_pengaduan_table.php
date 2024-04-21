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
        Schema::table('laporan_pengaduan', function (Blueprint $table) {
            $table->enum('status', ['ditolak', 'diterima', 'selesai', 'proses'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('laporan_pengaduan', function (Blueprint $table) {
            $table->enum('status', ['ditolak', 'diterima', 'selesai'])->nullable()->change();
        });
    }
};
