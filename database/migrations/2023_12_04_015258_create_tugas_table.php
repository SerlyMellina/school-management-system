<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tugass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_kelas');
            $table->integer('id_mapel');
            $table->string('deskripsi');
            $table->date('tgl_pengumpulan');
            $table->text('file');
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
        Schema::dropIfExists('tbl_tugass');
    }
}
