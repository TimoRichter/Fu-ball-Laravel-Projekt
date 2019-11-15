<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->truncate();

        DB::table('players')->insert([
            'firstname'=> 'Phillip',
            'name'=> 'Max',
            'age'=> '25',
            'position'=> 'Verteidigung',
            'marketvalue'=> '17503442',
            'team_id'=> '1',

        ]);
        DB::table('players')->insert([
            'firstname'=> 'Andre',
            'name'=> 'Hahn',
            'age'=> '29',
            'position'=> 'Sturm',
            'marketvalue'=> '3391921',
            'team_id'=> '1',
        ]);
        DB::table('players')->insert([
            'firstname'=> 'Rani',
            'name'=> 'Khedira',
            'age'=> '25',
            'position'=> 'Mittelfeld',
            'marketvalue'=> '9456636',
            'team_id'=> '1',
        ]);
        DB::table('players')->insert([
            'firstname'=> 'Daniel',
            'name'=> 'Baier',
            'age'=> '35',
            'position'=> 'Mittelfeld',
            'marketvalue'=> '6715522',
            'team_id'=> '1',
        ]);
    }
}
