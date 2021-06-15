<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadershipusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadershipuser', function (Blueprint $table) {
            $table->id();
            $table->integer('id_leadership');
            $table->integer('id_user');
            $table->timestamps();
        });

        Schema::table('leadershipuser', function($table) {
            $table->foreign('id_leadership')->references('id')->on('leadership');
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
        Schema::dropIfExists('leadershipuser');
    }
}
