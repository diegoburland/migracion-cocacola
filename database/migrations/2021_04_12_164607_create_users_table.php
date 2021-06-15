<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identification');
            $table->string('names');
            $table->string('surnames');
            $table->string('code');
            $table->timestamp('date_registration');
            $table->boolean('state')->default(true);
            $table->integer('id_zone');
            $table->integer('id_profile');
            $table->longText('token_reset')->nullable();
            $table->longText('token_access')->nullable();
            $table->string('key_auth')->nullable();
            $table->string('nomen')->nullable();
            $table->timestamps();

        });

        Schema::table('users', function($table) {
            $table->foreign('id_zone')->references('id')->on('zone');
            $table->foreign('id_profile')->references('id')->on('profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
