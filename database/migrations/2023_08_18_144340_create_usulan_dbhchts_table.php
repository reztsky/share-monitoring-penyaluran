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
        Schema::create('usulan_dbhchts', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('no_kk',16);
            $table->string('nama');
            $table->string('alamat');
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('jenis_bantuan_modal');
            $table->integer('tahun_anggaran');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('usulan_dbhchts');
    }
};
