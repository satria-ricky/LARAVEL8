<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenanganankeluhansTable extends Migration
{
    public function up()
    {
        Schema::create('penanganankeluhans', function (Blueprint $table) {
            $table->id('id_penanganankeluhan', 20);
            $table->string('kode_keluhan', 20);
            $table->string('nama_customer', 100);
            $table->date('tanggal_keluhan')->nullable();
            $table->string('keluhan', 100);
            $table->date('tanggal_ditanggapi')->nullable();
            $table->string('produk_yang_digunakan', 100);
            $table->string('penanganan_keluhan', 100);
            $table->string('tindak_lanjut', 100);
            $table->integer('status', 0)->unsigned();
            $table->integer('pabrik', false);
            $table->integer("user_id", false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penanganankeluhans');
    }
}
