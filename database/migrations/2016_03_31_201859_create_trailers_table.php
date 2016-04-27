<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cinematographs_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('poster');
            $table->text('carousel_image');
            $table->string('video_link');
            $table->integer('year');
            $table->string('age_limit');
            $table->string('country');
            $table->string('premiere_in_ukraine');
            $table->string('world_premiere');
            $table->string('rating_kinopoisk');
            $table->string('rating_iMDb');
            $table->boolean('active');
            $table->boolean('editors_choice');
            $table->boolean('carousel_active');
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
        //
    }
}
