<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_trailer', function (Blueprint $table) {
            $table->integer('actor_id')->unsigned();
            $table->integer('trailer_id')->unsigned();
            $table->primary(['actor_id', 'trailer_id']);


            $table->foreign('actor_id')
                ->references('id')->on('actors')
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
//        Schema::table('actor_trailer', function (Blueprint $table) {
//            $table->dropPrimary('actor_trailer_actor_id_trailer_id_primary'); // Удалить индекс 'actor_id_trailer_id_primary'
//
//            $table->dropForeign('actor_trailer_actor_id_foreign');
//            $table->dropForeign('actor_trailer_trailer_id_foreign');
//        });

        Schema::drop('actor_trailer');
    }
}
