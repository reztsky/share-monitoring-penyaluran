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
        Schema::table('kpm_blts', function (Blueprint $table) {
            $table->integer('tahun_anggaran')->after('status_kpm_sebagai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpm_blts', function (Blueprint $table) {
            $table->dropColumn('tahun_anggaran');
        });
    }
};
