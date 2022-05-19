<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('laporan_id',5);
            $table->string('laporan_nama', 255);
            $table->string('laporan_batch', 255);
            $table->integer('laporan_nomor',0)->unsigned();
            $table->string('laporan_diajukan', 255);
            $table->date('tgl_diajukan');
            $table->string('laporan_diterima', 255);
            $table->date('tgl_diterima');
            $table->integer("pabrik_id",false);
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
        Schema::dropIfExists('laporans');
    }
}