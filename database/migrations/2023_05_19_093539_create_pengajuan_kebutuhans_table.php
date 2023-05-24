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
            $table->char('jenis_kelamin',1);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->char('rw',3);
            $table->char('rt',3);
            $table->string('alamat');
            $table->string('no_hp',15);
            $table->bigInteger('id_jenis_kebutuhan');
            $table->integer('status_pengajuan')->comment('1 : Disetujui, 2 : Ditolak, 3 : Menunggu')->default(3);
            $table->timestamps();
            // $table->string('no_surat');
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
