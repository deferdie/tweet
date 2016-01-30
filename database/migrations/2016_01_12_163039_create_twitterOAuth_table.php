<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterOAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('twitterOAuth', function(Blueprint $table){
        $table->increments('id');
        $table->integer('userID');
        $table->string('clientID');
        $table->string('oauth_token');
        $table->string('oauth_token_secret');
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
        Schema::drop('twitterOAuth');
    }
}
