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
            $table->integer('lebih_banyak_kopi_teh')->comment('1 : Lebih Banyak Kopi / 2 : Lebih Banyak Teh');
            $table->integer('harga_jual_kopi')->default(0);
            $table->integer('harga_jual_teh')->default(0);
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
        Schema::dropIfExists('transaksi_monitoring_warung_kopis');
    }
};
