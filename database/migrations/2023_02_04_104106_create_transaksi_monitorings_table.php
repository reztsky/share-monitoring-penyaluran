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
        Schema::create('transaksi_monitorings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inserted_by');
            $table->bigInteger('id_kpm_modal');
            $table->text('alamat_tempat_usaha');
            $table->string('jenis_bantuan_modal');
            $table->string('no_hp',20);
            // Pengelolaan Modal Usaha
            $table->integer('pengelolaan_usaha')->comment('1 : Usaha Perorangan / 2 : Usaha Kelompok ');
            $table->integer('bentuk_usaha')->comment('1 : Usaha Utama / 2: Usaha Sampingan');
            $table->integer('penggunaan_bantuan')->comment('1 : Mengawali Kegiatan Usaha / 2 : Tambahan Modal Usaha / 3 : Belum Digunakan ');
            $table->string('alasan_penggunaan_bantuan')->nullable();
            // Hasil Usaha
            $table->string('penghasilan_sebulan')->default('')->comment('Range Penghasilan');
            $table->text('kegunaan_hasil_usaha')->nullable()->comment('Array');
            // Lain Lain
            $table->string('kendala')->nullable();
            $table->string('harapan')->nullable();
            $table->string('dokumentasi');
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
        Schema::dropIfExists('transaksi_monitorings');
    }
};
