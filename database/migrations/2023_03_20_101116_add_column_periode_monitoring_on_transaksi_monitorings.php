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
            $table->after('dokumentasi', function ($table) {
                $table->integer('periode_monitoring')->comment('Periode Monitoring Dalam Angka Bulan');
                $table->integer('tahun_monitoring')->comment('Tahun Monitoring');
            });
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
            $table->dropColumn('periode_monitoring');
            $table->dropColumn('tahun_monitoring');
        });
    }
};
