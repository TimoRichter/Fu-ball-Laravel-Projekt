<?php

namespace App\Console\Commands;

use App\Game;
use App\League;
use App\Player;
use App\Team;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from files in storage and exports them to database defined in .env';

    protected $players_file = 'bundesliga_Spieler.csv';
    protected $teams_file = 'bundesliga_Verein.csv';
    protected $leagues_file = 'bundesliga_Liga.csv';
    protected $games_file = 'bundesliga_Spiel.csv';

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

        $files = Storage::disk('local')->allFiles();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        League::query()->truncate();
        Game::query()->truncate();
        Player::query()->truncate();
        Team::query()->truncate();
        DB::beginTransaction();
        foreach ($files as $file) {
            if (strpos($file, 'Liga.csv') > 1) {
                $this->insertleagues();
            }
            if (strpos($file, 'Spiel.csv') > 1) {
                $this->insertgames();
            }
            if (strpos($file, 'Spieler.csv') > 1) {
                $this->insertplayers();
            }
            if (strpos($file, 'Verein.csv') > 1) {
                $this->insertteams();
            }
        }
        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     *
     * @param $filename
     * @return 1|array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function fileExploder($filename)
    {
        $filecontent = Storage::disk('local')->get($filename);
        if (mb_detect_encoding($filecontent, 'UTF-8', true) == false) {
            $filecontent = utf8_encode($filecontent);
        }
        $fileArray = array_slice(explode("\n", $filecontent), 1);
        foreach ($fileArray as $key => $value) {
            $fileArray[$key] = explode(';', trim($value));
            if (empty($value[0])) {
                unset($fileArray[$key]);
            }
        }
        return $fileArray;
    }

    /**
     *
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function insertplayers()
    {
        $arrays = $this->fileExploder($this->players_file);
        foreach ($arrays as $zeile) {
            $data = [
                'team_id' => $zeile[1],
                'shirtnumber' => $zeile[2] ?: null,
                'playername' => $zeile[3],
                'nationality' => $zeile[4],
                'games' => $zeile[5],
                'goals' => $zeile[6],
                'assists' => $zeile[7]
            ];
            $player = new Player();
            $player->fill($data);
            $player->save();
        }
    }

    /**
     *
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function insertteams()
    {
        $arrays = $this->fileExploder($this->teams_file);
        foreach ($arrays as $zeile) {
            $data = [
                'teamname' => $zeile[1],
                'league_id' => $zeile[2]
            ];
            $team = new Team();
            $team->fill($data);
            $team->save();
        }
    }

    /**
     *
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function insertgames()
    {
        $arrays = $this->fileExploder($this->games_file);
        foreach ($arrays as $zeile) {
            $data = [
                'matchday' => $zeile[1],
                'date' => $zeile[2],
                'time' => $zeile[3],
                'home' => $zeile[4],
                'guest' => $zeile[5],
                'homegoals' => $zeile[6],
                'guestgoals' => $zeile[7]
            ];
            $game = new Game();
            $game->fill($data);
            $game->save();
        }
    }

    /**
     *
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function insertleagues()
    {
        $arrays = $this->fileExploder($this->leagues_file);
        foreach ($arrays as $zeile) {
            $data = [
                'association' => $zeile[1],
                'firstgame' => $zeile[2],
                'winner' => $zeile[3],
                'recordplayer' => $zeile[4],
                'recordplayergames' => $zeile[5]
            ];
            $league = new League();
            $league->fill($data);
            $league->save();
        }
    }
}

