<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangmasuks', function (Blueprint $table) {
            $table->id("barangmasuk_id",5);
            $table->date("barangmasuk_tgl");
            $table->string("barangmasuk_noloth", 25);
            $table->string("barangmasuk_pemasok", 100);
            $table->integer("barangmasuk_jumlah",false);
            $table->string("barangmasuk_nokontrol", 25);
            $table->date("barangmasuk_kadaluarsa");
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
        Schema::dropIfExists('barangmasuks');
    }
}
