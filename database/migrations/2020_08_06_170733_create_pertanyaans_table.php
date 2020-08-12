<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id_pertanyaan');
            $table->string('judul');
            $table->string('isi');
            $table->date('tanggal_dibuat');
            $table->date('tanggal_diperbaharui');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jawaban_id')->references('id_jawaban')->on('jawabans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}
