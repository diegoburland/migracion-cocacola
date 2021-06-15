<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('state')->default(true);
            $table->integer('id_zone')->nullable();
            $table->integer('id_management')->nullable();
            $table->integer('id_leadership')->nullable();
            $table->integer('id_distributor')->nullable();
            $table->string('code_boss')->nullable();
            $table->string('code_management')->nullable();
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
        Schema::dropIfExists('route');
    }
}
