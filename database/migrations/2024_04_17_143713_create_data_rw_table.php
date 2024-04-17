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
        Schema::create('data_rw', function (Blueprint $table) {
            $table->string('No_RW', 10)->primary();
            $table->unsignedBigInteger('NIK')->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('periode_jabatan', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_rw');
    }
};
