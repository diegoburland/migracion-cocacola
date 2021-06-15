<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('id_route');
            $table->integer('id_departmentcategory');
            $table->integer('id_classification');
            $table->boolean('includes_fridge')->default(false);
            $table->boolean('includes_trellis')->default(false);
            $table->integer('id_channel');
            $table->boolean('state')->default(true);
            $table->char('deleted')->nullable()->default('n');
            
            $table->timestamps();
        });

        Schema::table('store', function($table) {
            $table->foreign('id_departmentcategory')->references('id')->on('departmentcategory');
            $table->foreign('id_classification')->references('id')->on('classification');
            $table->foreign('id_channel')->references('id')->on('channel');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
