<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tb_aset', function (Blueprint $table) {
            $table->id('aset_id');
            $table->string('aset_no_rekening');
            $table->text('aset_deskripsi');
            $table->integer('aset_qty');
            $table->date('aset_tgl_perolehan');
            $table->date('aset_tgl_akhir');
            $table->double('aset_saldo_perolehan');
            $table->double('aset_akm_susut');
            $table->double('aset_nilai_buku');
            $table->double('aset_prs_susut');
            $table->string('aset_gssl_induk');
            $table->text('aset_uraian');
            $table->string('aset_foto')->nullable();
            $table->integer('aset_sumber_perolehan');
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
        Schema::dropIfExists('tb_aset');
    }
}
