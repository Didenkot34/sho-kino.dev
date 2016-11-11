<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_trailer', function (Blueprint $table) {
            $table->integer('country_id')->unsigned();
            $table->integer('trailer_id')->unsigned();
            $table->primary(['country_id', 'trailer_id']);

            $table->foreign('country_id')
                ->references('id')->on('countries')
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
//        Schema::table('country_trailer', function (Blueprint $table) {
//            $table->dropPrimary('country_trailer_country_id_trailer_id_primary'); // Удалить индекс 'country_trailer_country_id_trailer_id_primary'
//
//            $table->dropForeign('country_trailer_country_id_foreign');
//            $table->dropForeign('country_trailer_trailer_id_foreign');
//        });

        Schema::drop('country_trailer');
    }
}
