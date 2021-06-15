<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managementuser', function (Blueprint $table) {
            $table->id();
            $table->integer('id_management');
            $table->integer('id_user');
            $table->timestamps();
        });

        Schema::table('managementuser', function($table) {
            $table->foreign('id_management')->references('id')->on('management');
            $table->foreign('id_user')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managementuser');
    }
}
