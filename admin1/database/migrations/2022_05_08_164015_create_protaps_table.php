<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protaps', function (Blueprint $table) {
            $table->id('protap_id',5);
            $table->string('protap_nama', 255);
            $table->string('protap_nomor', 255);
            $table->string('protap_diajukan', 255);
            $table->string('protap_tgl_diajukan', 255);
            $table->string('protap_diterima', 255);
            $table->string('protap_tgl_diterima', 255);
            $table->string('protap_ruangan', 255);
            $table->string('protap_file', 255);
            $table->string('protap_pabrik', 255);
            $table->string('protap_jenis', 255);
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
        Schema::dropIfExists('protaps');
    }
}
