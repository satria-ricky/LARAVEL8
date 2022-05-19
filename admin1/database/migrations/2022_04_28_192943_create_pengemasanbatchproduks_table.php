<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengemasanbatchproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengemasanbatchproduks', function (Blueprint $table) {
            $table->id('id_pengemasanbatchproduk', 20);
            $table->string('protap', 20);
            $table->string('kode_produk', 20);
            $table->string('nama_produk', 200);
            $table->string('no_batch', 20);
            $table->string('besar_batch', 200);
            $table->string('bentuksediaan', 200);
            $table->string('kemasan', 200);
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
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
        Schema::dropIfExists('pengemasanbatchproduks');
    }
}
