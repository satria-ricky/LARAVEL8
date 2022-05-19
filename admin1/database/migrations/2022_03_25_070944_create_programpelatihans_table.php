<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrampelatihansTable extends Migration
{
    public function up()
    {
        Schema::create('programpelatihans', function (Blueprint $table) {
            $table->integer('id_programpelatihan', 11);
            $table->string('kode_pelatihan', 100);
            $table->string('materi_pelatihan', 100);
            $table->string('peserta_pelatihan', 100);
            $table->string('pelatih', 100);
            $table->string('metode_pelatihan', 100);
            $table->date('jadwal_mulai_pelatihan')->nullable();
            $table->date('jadwal_berakhir_pelatihan')->nullable();
            $table->string('metode_penilaian', 100);
            $table->integer('pabrik', false);
            $table->tinyInteger('status', 0)->unsigned();
            $table->integer("user_id", false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programpelatihans');
    }
}
