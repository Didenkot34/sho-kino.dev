<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_trailer', function (Blueprint $table) {
            $table->integer('genre_id')->unsigned();
            $table->integer('trailer_id')->unsigned();
            $table->primary(['genre_id', 'trailer_id']);

            $table->foreign('genre_id')
                ->references('id')->on('genres')
                ->onDelete('cascade');

            $table->foreign('trailer_id')
                ->references('id')->on('trailers')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('genre_trailer', function (Blueprint $table) {
//            $table->dropPrimary('genre_trailer_genre_id_trailer_id_primary'); // Удалить индекс 'genre_trailer_genre_id_trailer_id_primary'
//
//            $table->dropForeign('genre_trailer_genre_id_foreign');
//            $table->dropForeign('genre_trailer_trailer_id_foreign');
//        });

        Schema::drop('genre_trailer');
    }
}
