<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePPbahanbakukeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_pbahanbakukeluars', function (Blueprint $table) {
            $table->id("id_ppbahanbakukeluar", 10);
            $table->date('tanggal')->nullable();
            $table->string("nama_bahan", 100);
            $table->string("untuk_produk", 100);
            $table->string("no_batch", 0);
            $table->string("jumlah", 100);
            $table->string("sisa", 100);
            $table->integer('pabrik', false);
            $table->integer('induk', false);
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
        Schema::dropIfExists('p_pbahanbakukeluars');
    }
}
