<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likeFilms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->integer('id_film')->unsigned()->index()->default(0);

//            $table->foreign('id_film')
//                ->references('id_film')
//                ->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likeFilms');
    }
}
