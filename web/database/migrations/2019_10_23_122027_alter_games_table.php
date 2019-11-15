<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table){
            $table->bigInteger('home')->unsigned()->change();
            $table->bigInteger('guest')->unsigned()->change();
        });

        Schema::table('games', function ($table) {

            $table->foreign('home')->references('id')->on('teams');
            $table->foreign('guest')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
