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
            $table->string('no_urut',16)->after('id');
            $table->integer('tahap')->after('tahun_anggaran');
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
            $table->dropColumn('no_urut');
            $table->dropColumn('tahap');
        });
    }
};
