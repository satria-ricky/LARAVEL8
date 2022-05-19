<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetiltimbangbahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detiltimbangbahans', function (Blueprint $table) {
            $table->id("id_detiltimbangbahan");
            $table->date("tanggal");
            $table->string("nama_bahan", 100);
            $table->string("nama_suplier", 100);
            $table->string("jumlah_bahan", 20);
            $table->string("hasil_penimbangan", 20);
            $table->integer("induk",0);
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
        Schema::dropIfExists('detiltimbangbahans');
    }
}
