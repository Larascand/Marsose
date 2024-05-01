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
        Schema::create('kk', function (Blueprint $table) {
            $table->string('No_KK', 20)->primary();
            $table->string('kepala_keluarga', 100)->nullable();
            $table->string('No_RT', 10)->nullable();
            $table->string('No_RW', 10)->nullable();
            $table->timestamps();

            $table->foreign('No_RT')->references('No_RT')->on('data_rt')->onDelete('set null');
            $table->foreign('No_RW')->references('No_RW')->on('data_rw')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kk');
    }
};
