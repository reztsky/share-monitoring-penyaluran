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
        Schema::create('detail_monitoring_warung_kopis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi');
            $table->json('nama_barang');
            $table->json('jumlah_awal');
            $table->json('jumlah_saat_ini');
            $table->json('harga');
            $table->string('catatan');
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
        Schema::dropIfExists('detail_monitoring_warung_kopis');
    }
};
