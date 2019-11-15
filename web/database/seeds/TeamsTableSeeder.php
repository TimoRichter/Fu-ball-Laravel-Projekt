<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->truncate();

        DB::table('teams')->insert([
            'name' => 'FC Augsburg',
            'founded' => '1907',
            'stadion' => 'WWK-Arena',
            'president' => 'Klaus Hofmann',
        ]);

        DB::table('teams')->insert([
            'name' => 'FC Bayern',
            'founded' => '1900',
            'stadion' => 'Allianz-Arena',
            'president' => 'Uli Hoeness',
        ]);
    }
}
