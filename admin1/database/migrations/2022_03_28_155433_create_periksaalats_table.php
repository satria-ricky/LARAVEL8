<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePeriksaalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksaalats', function (Blueprint $table) {
            $table->id('id_periksaalat');
            $table->date('tanggal')->nullable();
            $table->string('nama_ruangan', 200);
            $table->string('nama_alat', 200);
            $table->string('bagian_alat', 200);
            $table->string('cara_pembersihan', 200);
            $table->string('pelaksana', 200);
            $table->string('persetujuan', 200)->nullable();
            $table->string('keterangan', 200);
            $table->integer('pabrik', false);
            $table->tinyInteger('status', 0)->unsigned();
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
        Schema::dropIfExists('periksaalats');
    }
}
