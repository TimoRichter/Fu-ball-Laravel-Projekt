<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHomeTableZweiteLiga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_table_zweite_liga', function (Blueprint $table) {
            $table->bigInteger('team_id')->unsigned()->change();
        });
        Schema::table('home_table_zweite_liga', function ($table) {
            $table->foreign('team_id')->references('id')->on('teams');
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
