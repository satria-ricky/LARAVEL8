<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangkeluars', function (Blueprint $table) {
            $table->id("barangkeluar_id",5);
            $table->date("barangkeluar_tgl");
            $table->string("barangkeluar_utkproduk", 25);
            $table->string("barangkeluar_nobatch", 100);
            $table->integer("barangkeluar_jumlah",false);
            $table->integer("barangkeluar_sisa", false);
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
        Schema::dropIfExists('barangkeluars');
    }
}
