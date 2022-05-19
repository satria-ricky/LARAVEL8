<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenimbangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penimbangans', function (Blueprint $table) {
            $table->id("penimbangan_id", 10);
            $table->string("penimbangan_kodebahan", 100);
            $table->string("penimbangan_namabahan", 100);
            $table->string("penimbangan_loth", 100);
            $table->integer("penimbangan_jumlahbutuh", false);
            $table->integer("penimbangan_jumlahtimbang", false);
            $table->string("penimbangan_timbangoleh", 100);
            $table->string("penimbangan_periksaoleh", 100);
            $table->string("nomor_batch",100);
            $table->integer("user_id",false);
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
        Schema::dropIfExists('penimbangans');
    }
}
