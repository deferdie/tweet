<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSocialMediaVault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_vaults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID');
            $table->integer('clientID');
            $table->string('twitterName');
            $table->string('twitterID');
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
        Schema::drop('social_media_vaults');
    }
}
