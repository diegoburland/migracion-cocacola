<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('includes_fridge');
            $table->integer('id_departmentcategory');
            $table->integer('id_classification');
            $table->boolean('state')->default(true);
            $table->timestamps();
        });

        Schema::table('form', function($table) {
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
        Schema::dropIfExists('form');
    }
}
