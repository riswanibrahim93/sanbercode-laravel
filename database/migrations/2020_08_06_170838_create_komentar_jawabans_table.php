<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jawabans', function (Blueprint $table) {
            $table->bigIncrements('id_komentar_jawaban');
            $table->string('isi');
            $table->date('tanggal_dibuat');
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('profile_id')->references('id_profile')->on('profiles');
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
        Schema::dropIfExists('komentar_jawabans');
    }
}
