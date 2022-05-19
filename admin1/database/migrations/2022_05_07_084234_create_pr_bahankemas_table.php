<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrBahankemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_bahankemas', function (Blueprint $table) {
            $table->id('id_pr_bahankemas');
            $table->string('kode_kemas',255);
            $table->string('nama_kemas',255);
            $table->string('j_butuh',255);
            $table->string('j_tolak',255);
            $table->string('no_qc',255);
            $table->string('j_pakai',255);
            $table->string('j_kembali',255);
            $table->integer('id_kemasbatch',0);
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
        Schema::dropIfExists('pr_bahankemas');
    }
}
