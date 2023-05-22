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
        Schema::create('pengajuan_kebutuhans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik',16);
            $table->string('no_kk',16);
            $table->string('nama');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->bigInteger('id_jenis_kebutuhan');
            // $table->string('no_surat');
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
        Schema::dropIfExists('pengajuan_kebutuhans');
    }
};
