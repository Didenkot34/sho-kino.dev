<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trailer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('comment');
            $table->timestamps();

            $table->index('trailer_id');
            $table->index('user_id');

            $table->foreign('trailer_id')
                ->references('id')->on('trailers')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
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
//        Schema::table('comments', function (Blueprint $table) {
//            $table->dropIndex('comments_trailer_id_index'); // Удалить индекс 'comments_trailer_id_index'
//            $table->dropIndex('comments_user_id_index'); // Удалить индекс 'comments_trailer_id_index'
//
//            $table->dropForeign('comments_user_id_foreign');
//            $table->dropForeign('comments_trailer_id_foreign');
//        });
        
        Schema::drop('comments');
    }
}
