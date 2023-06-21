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
        Schema::table('penyaluran_kebutuhans',function(Blueprint $table){
            $table->date('tanggal_salur')->after('foto_penyaluran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyaluran_kebutuhans',function(Blueprint $table){
            $table->dropColumn('tanggal_salur');
        });
    }
};
