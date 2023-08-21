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
        Schema::create('daftar_kpm_banmod_alls', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik',16);
            $table->string('no_kk',16);
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('jenis_bantuan_modal');
            $table->string('tahun_anggaran');
            $table->integer('status_aktif');
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
        Schema::dropIfExists('daftar_kpm_banmod_alls');
    }
};
