<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingquestion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ratingstore');
            $table->integer('id_formquestion');
            $table->integer('value_question');
            $table->double('score_question');
            $table->timestamps();
        });

        Schema::table('ratingquestion', function($table) {
            $table->foreign('id_ratingstore')->references('id')->on('ratingstore');
            $table->foreign('id_formquestion')->references('id')->on('formquestion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classification_question');
    }
}
