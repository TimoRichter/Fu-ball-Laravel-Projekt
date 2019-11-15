<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->bigInteger('team_id')->unsigned();
            $table->dropColumn('age');
            $table->dropColumn('position');
            $table->dropColumn('marketvalue');
            $table->integer('shirtnumber')->nullable();
            $table->dropColumn('firstname');
            $table->dropColumn('name');
            $table->string('playername');
            $table->string('nationality');
            $table->integer('games');
            $table->integer('goals');
            $table->integer('assists');
            $table->timestamps();
        });
        Schema::table('players', function ($table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
