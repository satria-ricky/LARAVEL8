<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatbersihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatbersihs', function (Blueprint $table) {
            $table->id("catatbersih_id",5);
            $table->string("catatbersih_produk",100);
            $table->string("catatbersih_batchnum",100);
            $table->string("catatbersih_prosedurnum",100);
            $table->string("catatbersih_namaruang",100);
            $table->string("catatbersih_carabersih",100);
            $table->string("catatbersih_pelaksana",100);
            $table->string("catatbersih_periksa",100);
            $table->boolean("catatbersih_lantaidinding");
            $table->boolean("catatbersih_meja");
            $table->boolean("catatbersih_jendela");
            $table->boolean("catatbersih_plafon");
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
        Schema::dropIfExists('catatbersihs');
    }
}
