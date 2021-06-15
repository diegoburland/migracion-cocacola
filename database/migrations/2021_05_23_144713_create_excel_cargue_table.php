<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelCargueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_load', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('route');
            $table->string('classification');
            $table->boolean('has_fridge');
            $table->boolean('has_lattice');
            $table->string('deparment');
            $table->string('category');
            $table->string('channel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_cargue');
    }
}
