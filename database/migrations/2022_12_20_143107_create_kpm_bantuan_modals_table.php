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
        Schema::create('kpm_bantuan_modals', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik',16);
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('jenis_bantuan_modal');
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
        Schema::dropIfExists('kpm_bantuan_modals');
    }
};
