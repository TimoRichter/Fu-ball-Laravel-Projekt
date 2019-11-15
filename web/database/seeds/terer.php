<?php

use Illuminate\Database\Seeder;

class terer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'FC Augsburg',
            'founded' => '1907',
            'stadion' => 'WWK-Arena',
            'president' => 'Klaus Hofmann'
        ]);
    }
}
