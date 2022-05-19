<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cp_bahans', function (Blueprint $table) {
            $table->id('cp_bahan_id');
            $table->string('nama');
            $table->string('ruang');
            $table->string('jumlah');
            $table->string('kode');
            $table->tinyInteger('pabrik', 0)->unsigned();
            $table->tinyInteger('status', 0)->unsigned();
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
        Schema::dropIfExists('cp_bahans');
    }
}
