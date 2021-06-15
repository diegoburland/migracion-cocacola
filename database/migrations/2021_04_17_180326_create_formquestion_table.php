<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormquestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formquestion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_form');
            $table->integer('id_question');
            $table->double('value_question');
            $table->integer('orden');
            $table->timestamps();
        });

        Schema::table('formquestion', function($table) {
            $table->foreign('id_form')->references('id')->on('form');
            $table->foreign('id_question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formquestion');
    }
}
