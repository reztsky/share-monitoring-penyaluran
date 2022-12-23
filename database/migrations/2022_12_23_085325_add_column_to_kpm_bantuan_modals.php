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
            $table->integer('status_aktif')->after('jenis_bantuan_modal')->comment('Status Aktif Data Digunakan untuk menandai data mana yang sudah fix dan yang belum (1 Fix, 2 Null)');
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
            $table->dropColumn('status_aktif');
        });
    }
};
