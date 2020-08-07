<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikeJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_jawabans', function (Blueprint $table) {
            $table->bigIncrements('id_jawaban');
            $table->integer('poin');
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
        Schema::dropIfExists('like_dislike_jawabans');
    }
}
