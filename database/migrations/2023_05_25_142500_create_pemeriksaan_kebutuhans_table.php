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
        Schema::create('pemeriksaan_kebutuhans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_pengajuan');
            $table->string('bap')->nullable();
            $table->integer('verifikasi')->default(0)->comment('1 : Setuju / 2:Tolak / 0:null')->nullable();
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
        Schema::dropIfExists('pemeriksaan_kebutuhans');
    }
};
