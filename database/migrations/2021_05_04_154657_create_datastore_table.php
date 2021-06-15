<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatastoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datastore', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('code_route');
            $table->string('name_classification');
            $table->string('name_department');
            $table->string('name_category');
            $table->string('name_channel');
            $table->boolean('is_fridge');
            $table->boolean('is_lattice');
            $table->integer('id_excel');
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
        Schema::dropIfExists('datastore');
    }
}
