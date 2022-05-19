<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaruangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksaruangs', function (Blueprint $table) {
            $table->id('id_periksaruang');
            $table->date('tanggal')->nullable();
            $table->string('waktu', 100);
            $table->string('nama_ruangan', 200);
            $table->string('lantai', 5)->nullable();
            $table->string('dinding', 5)->nullable();
            $table->string('meja', 5)->nullable();
            $table->string('jendela', 5)->nullable();
            $table->string('kontainer', 5)->nullable();
            $table->string('langit', 5)->nullable();
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
        Schema::dropIfExists('periksaruangs');
    }
}
