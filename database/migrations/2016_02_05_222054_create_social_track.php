<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialTracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID');
            $table->integer('twitter');
            $table->integer('linkedin');
            $table->integer('facebook');
            $table->integer('google');
            $table->integer('instagram');
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
        Schema::drop('socialTracks');
    }
}
