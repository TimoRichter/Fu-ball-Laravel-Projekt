<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDritteLigaBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dritte_liga_backup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id');
            $table->integer('wins');
            $table->integer('ties');
            $table->integer('loses');
            $table->integer('points');
            $table->integer('goals');
            $table->integer('takengoals');
            $table->integer('playedgames');
            $table->integer('winrate');
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
        Schema::dropIfExists('dritte_liga_backup');
    }
}
