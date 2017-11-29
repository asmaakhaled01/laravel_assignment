<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned()->nullable();
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade');
            $table->string('name');
            $table->string('comment');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('film_comment');
    }
}
