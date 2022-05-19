<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpesifikasibahanbakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spesifikasibahanbakus', function (Blueprint $table) {
            $table->id('id_spesifikasibahanbaku', 20);
            $table->string('kode_spesifikasi', 20);
            $table->string('nama_bahanbaku', 200);
            $table->string('jenis_sediaan', 200);
            $table->string('warna', 200);
            $table->string('aroma', 200);
            $table->string('tekstur', 200);
            $table->string('bobot', 200);
            $table->date('tanggal')->nullable();
            $table->integer('pabrik', false);
            $table->integer("status", false);
            $table->integer('user_id', 0)->unsigned();
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
        Schema::dropIfExists('spesifikasibahanbakus');
    }
}
