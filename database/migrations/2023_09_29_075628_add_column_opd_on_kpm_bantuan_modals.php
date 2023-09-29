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
        Schema::table('kpm_bantuan_modals', function (Blueprint $table) {
            $table->string('opd_verif_pimpinan')->nullable();
            $table->string('opd_asal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpm_bantuan_modals', function (Blueprint $table) {
            $table->dropColumn('opp_verif_pimpinan');
            $table->dropColumn('opd_asal');
        });
    }
};
