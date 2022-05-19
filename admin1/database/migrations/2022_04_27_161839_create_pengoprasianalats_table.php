<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengoprasianalatsTable extends Migration
{
	public function up()
	{
		Schema::create('pengoprasianalats', function (Blueprint $table) {

			$table->id('id_operasi', 20);
			$table->string('pob', 20);
			$table->date('tanggal')->nullable();
			$table->string('nama_alat', 200);
			$table->string('tipe_merek', 200);
			$table->string('ruang', 200);
			$table->integer('pabrik', false);
			$table->tinyInteger('status', 0)->unsigned();
			$table->integer("user_id", false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('pengoprasianalats');
	}
};
