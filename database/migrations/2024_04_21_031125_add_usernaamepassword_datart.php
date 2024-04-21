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
        Schema::table('data_rt', function (Blueprint $table) {
            $table->string('username', 20)->nullable()->after('nama');
            $table->string('password', 20)->nullable()->after('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('data_rt', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }
};
