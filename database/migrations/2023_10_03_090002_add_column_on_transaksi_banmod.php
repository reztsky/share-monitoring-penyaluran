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
            $table->after('foto_pemberian', function ($table) {
                $table->string('ba_kpm')->nullable();
                $table->string('ba_kecamatan')->nullable();
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
        Schema::table('transaksi_bantuan_modals', function (Blueprint $table) {
            $table->dropColumn('ba_kpm');
            $table->dropColumn('ba_kecamatan');
        });
    }
};
