<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingquestionreplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingquestionreply', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ratingquestion');
            $table->integer('id_formquestionreply');
            $table->double('total_score');
            $table->double('reply_score');
            $table->timestamps();
        });

        Schema::table('ratingquestionreply', function($table) {
            $table->foreign('id_ratingquestion')->references('id')->on('ratingquestion');
            $table->foreign('id_formquestionreply')->references('id')->on('formquestionreply');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratingquestionreply');
    }
}
