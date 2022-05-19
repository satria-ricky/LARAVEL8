<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihancpkbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihancpkbs', function (Blueprint $table) {
            $table->integer('id_pelatihancpkb', 11);
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihancpkbs');
    }
}
