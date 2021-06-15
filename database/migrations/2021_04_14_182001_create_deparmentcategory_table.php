<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeparmentcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departmentcategory', function (Blueprint $table) {
            $table->id();
            $table->integer('id_department');
            $table->integer('id_category');
            $table->timestamps();
        });

        Schema::table('departmentcategory', function($table) {
            $table->foreign('id_department')->references('id')->on('department');
            $table->foreign('id_category')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deparmentcategory');
    }
}
