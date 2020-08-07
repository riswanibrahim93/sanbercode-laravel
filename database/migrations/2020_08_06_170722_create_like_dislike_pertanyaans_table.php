<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id_pertanyaan');
            $table->integer('poin');
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('profile_id')->references('id_profile')->on('profiles');
            $table->foreign('pertanyaan_id')->references('id_pertanyaan')->on('pertanyaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dislike_pertanyaans');
    }
}
