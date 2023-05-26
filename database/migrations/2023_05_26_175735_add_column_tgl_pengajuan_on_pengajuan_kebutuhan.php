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
        Schema::table('pengajuan_kebutuhans',function(Blueprint $table){
            $table->date('tanggal_pengajuan')->after('dokumentasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_kebutuhans',function(Blueprint $table){
            $table->dropColumn('tanggal_pengajuan');
        });
    }
};
