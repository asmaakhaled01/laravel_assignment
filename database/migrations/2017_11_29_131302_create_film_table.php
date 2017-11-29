<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->date('realease_date');
            $table->tinyInteger('rating')->unsigned();
            $table->float('ticket_price');
            $table->string('country');
            $table->string('slug');
            $table->string('photo_path');
        });
        
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        
        Schema::create('film_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned()->nullable();
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade');
            $table->integer('genre_id')->unsigned()->nullable();
            $table->foreign('genre_id')->references('id')->on('genre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('film');
        Schema::drop('genre');
        Schema::drop('film_genres');
    }
}
