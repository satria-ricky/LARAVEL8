<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpesifikasibahankemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spesifikasibahankemas', function (Blueprint $table) {
            $table->id('id_spesifikasibahankemas', 20);
            $table->string('kode_spesifikasi', 20);
            $table->string('nama_bahankemas', 200);
            $table->string('jenis_bahankemas', 200);
            $table->string('warna', 200);
            $table->string('ukuran', 200);
            $table->string('bocorcacat', 200);
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
        Schema::dropIfExists('spesifikasibahankemas');
    }
}
