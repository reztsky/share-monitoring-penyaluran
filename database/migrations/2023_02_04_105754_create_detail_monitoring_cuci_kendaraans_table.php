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
        Schema::create('detail_monitoring_cuci_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi');
            $table->integer('kendaraan_dicuci_sebulan')->default(0);
            $table->integer('harga_cuci')->default(0);
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
        Schema::dropIfExists('detail_monitoring_cuci_kendaraans');
    }
};
