<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingevidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingevidence', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ratingstore');
            $table->string('url_img_route');
            $table->timestamps();
        });

        Schema::table('ratingevidence', function($table) {
            $table->foreign('id_ratingstore')->references('id')->on('ratingstore');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratingevidence');
    }
}
