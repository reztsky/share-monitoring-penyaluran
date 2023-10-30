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
        Schema::table('transaksi_monitorings', function (Blueprint $table) {
            $table->text('keterangan_pendukung_pindah')->after('alasan_penggunaan_bantuan')->nullable()->comment('Keterangan Pendukung Untuk Status Penggunaan Pindah/Tidak Diketahui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_monitorings', function (Blueprint $table) {
            $table->dropColumn('keterangan_pendukung_pindah');
        });
    }
};
