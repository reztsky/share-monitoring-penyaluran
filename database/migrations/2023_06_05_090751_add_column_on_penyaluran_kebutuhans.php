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
            $table->string('sumber_dana')->after('tanggal_salur')->comment('APBD/BASNAS/KEMENSOS/LAINNYA');
            $table->string('sumber_dana_lainnya')->after('sumber_dana')->nullable();
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
            $table->dropColumn('sumber_dana');
            $table->dropColumn('sumber_dana_lainnya');
        });
    }
};
