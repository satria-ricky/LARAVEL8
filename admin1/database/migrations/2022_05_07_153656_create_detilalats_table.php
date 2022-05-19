<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detilalats', function (Blueprint $table) {
            $table->id('id_detilalat', 20);
			$table->dateTime('mulai')->nullable();
			$table->dateTime('selesai')->nullable();
			$table->string('oleh', 200);
			$table->string('ket', 200);
            $table->integer('induk',0)->unsigned();
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
        Schema::dropIfExists('detilalats');
    }
}
