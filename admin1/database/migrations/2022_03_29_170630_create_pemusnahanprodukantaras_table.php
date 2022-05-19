<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemusnahanprodukantarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemusnahanprodukantaras', function (Blueprint $table) {
            $table->id('id_pemusnahanprodukantara', 20);
            $table->string('kode_pemusnahan', 20);
            $table->date('tanggal_pemusnahan')->nullable();
            $table->string('nama_produkantara', 100);
            $table->string('no_batch', 20);
            $table->string('asal_produkantara', 20);
            $table->string('jumlah_produkantara', 20);
            $table->string('alasan_pemusnahan', 100);
            $table->string('cara_pemunsnahan', 100);
            $table->string('nama_petugas', 100);
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
        Schema::dropIfExists('pemusnahanprodukantaras');
    }
}
