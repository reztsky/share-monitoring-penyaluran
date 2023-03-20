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
            $table->integer('status_penggunaan_bantuan')->after('id_kpm_modal');
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
            $table->dropColumn('status_penggunaan_bantuan');
        });
    }
};
