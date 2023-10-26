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
        Schema::table('transaksi_bantuan_modals', function (Blueprint $table) {
            $table->string('foto_kpm')->nullable()->after('ba_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_bantuan_modals', function (Blueprint $table) {
            $table->dropColumn('foto_kpm');
        });
    }
};