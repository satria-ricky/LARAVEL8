<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContohbahanbakusTable extends Migration
{
    public function up()
    {
        Schema::create('contohbahanbakus', function (Blueprint $table) {
            $table->id('id_bahanbaku', 11);
            $table->string('kode_bahan', 20);
            $table->string('nama_bahanbaku', 200);
            $table->string('no_batch', 20);
            $table->date('tanggal_ambil')->nullable();
            $table->date('kedaluwarsa')->nullable();
            $table->string('jumlah_kemasanbox', 20);
            $table->string('jumlah_produk', 20);
            $table->string('jenis_warnakemasan', 200);
            $table->integer('pabrik', false);
            $table->tinyInteger('status', 0)->unsigned();
            $table->integer("user_id", false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contohbahanbakus');
    }
}
