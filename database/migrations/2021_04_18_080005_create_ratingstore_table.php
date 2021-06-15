<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingstoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingstore', function (Blueprint $table) {
            $table->id();
            $table->integer('id_form');
            $table->integer('id_store')->nullable();
            $table->integer('id_user');
            $table->timestamp('date_rating');
            $table->double('score_total');
            $table->integer('id_departmentcategory');
            $table->integer('id_classification');
            $table->boolean('includes_fridge');
            $table->longtext('observation')->nullable();
            $table->string('code_store')->nullable();
            $table->longtext('rating_json')->nullable();
            $table->timestamps();
        });

        Schema::table('ratingstore', function($table) {
            $table->foreign('id_form')->references('id')->on('form');
            $table->foreign('id_store')->references('id')->on('store');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_departmentcategory')->references('id')->on('departmentcategory');
            $table->foreign('id_classification')->references('id')->on('classification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratingstore');
    }
}
