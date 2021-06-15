<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormquestionreplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formquestionreply', function (Blueprint $table) {
            $table->id();
            $table->integer('id_formquestion');
            $table->integer('id_reply');
            $table->double('value_replay');
            $table->integer('orden');
            $table->timestamps();
        });

        Schema::table('formquestionreply', function($table) {
            $table->foreign('id_formquestion')->references('id')->on('formquestion');
            $table->foreign('id_reply')->references('id')->on('reply');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formquestionreply');
    }
}
