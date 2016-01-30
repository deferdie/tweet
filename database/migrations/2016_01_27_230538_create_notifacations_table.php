<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifacations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userID');
            $table->string('clientID');
            $table->integer('active');
            $table->string('message');
            $table->string('icon');
            $table->integer('warning');
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
        Schema::drop('notifacations');
    }
}
