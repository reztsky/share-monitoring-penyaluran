<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpm_blts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('status_kpm_sebagai')->comment('Digunakan untuk pembeda antara KPM Buruh/Pegawai Pabrik dengan Masyakarat Umum [1:untuk pegawai/buruh,2:untuk masyarakat umum]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpm_blts');
    }
};
