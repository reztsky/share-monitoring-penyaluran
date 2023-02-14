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
        Schema::create('detail_monitoring_laundries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi');
            $table->integer('harga_cuci_kering')->default(0)->comment('Harga Per Kg');
            $table->integer('harga_cuci_basah')->default(0)->comment('Harga Per Kg');
            $table->integer('harga_cuci_setrika')->default(0)->comment('Harga Per Kg');
            $table->integer('harga_setrika')->default(0)->comment('Harga Per Kg');
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
        Schema::dropIfExists('transaksi_monitoring_laundries');
    }
};
