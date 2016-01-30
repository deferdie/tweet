<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userStats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID');
            $table->integer('postSent');
            $table->integer('twitterPostsSent');
            $table->integer('facebookPostsSent');
            $table->integer('LinkedInPostsSent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userStats');
    }
}
