<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class DLCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads csv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $newLeague = "https://dbup2date.uni-bayreuth.de/blocklysql/downloads/bundesliga/bundesliga_Liga.csv";
        $newLeagueContents = file_get_contents($newLeague);
        Storage::put('bundesliga_Liga.csv', $newLeagueContents);

        $newGame = "https://dbup2date.uni-bayreuth.de/blocklysql/downloads/bundesliga/bundesliga_Spiel.csv";
        $newGameContents = file_get_contents($newGame);
        Storage::put('bundesliga_Spiel.csv', $newGameContents);

        $newPlayer = "https://dbup2date.uni-bayreuth.de/blocklysql/downloads/bundesliga/bundesliga_Spieler.csv";
        $newPlayerContents = file_get_contents($newPlayer);
        Storage::put('bundesliga_Spieler.csv', $newPlayerContents);

        $newTeam = "https://dbup2date.uni-bayreuth.de/blocklysql/downloads/bundesliga/bundesliga_Verein.csv";
        $newTeamContents = file_get_contents($newTeam);
        Storage::put('bundesliga_Verein.csv', $newTeamContents);
    }


}
