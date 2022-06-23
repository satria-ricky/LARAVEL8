<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasars', function (Blueprint $table) {
            $table->id('id_pasar');
            $table->string('nama_pasar');
            $table->string('alamat');
            $table->text('deskripsi')->nullable();
            $table->string('tahun_didirikan')->nullable();
            $table->string('perbaikan_terakhir')->nullable();
            $table->string('status_kepemilikan')->nullable();
            $table->double('luas_tanah')->nullable();
            $table->double('luas_bangunan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('komoditi')->nullable();
            $table->integer('jumlah_pedagang_los')->nullable();
            $table->integer('jumlah_pedagang_kios')->nullable();
            $table->string('aktivitas')->nullable();
            $table->string('type_pasar')->nullable();
            $table->string('foto')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('pasars');
    }
}
