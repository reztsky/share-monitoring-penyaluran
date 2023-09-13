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
            $table->integer('tahun_anggaran')->after('status_aktif');
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
            $table->dropColumn('tahun_anggaran');
        });
    }
};
