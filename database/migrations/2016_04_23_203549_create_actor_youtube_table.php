<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorYoutubeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_youtube', function (Blueprint $table) {
            $table->integer('actor_id')->unsigned();
            $table->integer('youtube_id')->unsigned();
            $table->primary(['actor_id', 'youtube_id']);

            $table->foreign('actor_id')
                ->references('id')->on('actors')
                ->onDelete('cascade');

            $table->foreign('youtube_id')
                ->references('id')->on('youtube')
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
//        Schema::table('actor_youtube', function (Blueprint $table) {
//            $table->dropPrimary('actor_youtube_actor_id_youtube_id_primary'); // Удалить индекс 'actor_id_youtube_id_primary'
//
//            $table->dropForeign('actor_youtube_actor_id_foreign');
//            $table->dropForeign('actor_youtube_youtube_id_foreign');
//        });
        
        Schema::drop('actor_youtube');
    }
}
