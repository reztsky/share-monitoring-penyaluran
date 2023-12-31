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
        Schema::create('penyaluran_kebutuhans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_pengajuan');
            $table->string('bap');
            $table->string('foto_penyaluran');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyaluran_kebutuhans');
    }
};
