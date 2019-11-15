<?php

namespace App\Console\Commands;

use App\StatsBackup;
use App\ZweiteLigaBackup;
use App\DritteLigaBackup;
use App\Team;
use App\Services\MatchService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CopyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:copy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copies the current tables to compare league positions';
    /**
     * @var MatchService
     */
    protected $season;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MatchService $matchService)
    {
        parent::__construct();
        $this->season = $matchService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->erste_liga_backup_status();
        $this->zweite_liga_backup_status();
        $this->dritte_liga_backup_status();
    }

    public function erste_liga_backup_status()
    {
        StatsBackup::query()->truncate();
        $teams = Team::where('league_id', '1')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();
            $team->guest();


            $data = [
                'team_id' => $team->id,
                'wins' => $team->wins,
                'ties' => $team->ties,
                'loses' => $team->loses,
                'points' => $team->points,
                'goals' => $team->goals,
                'takengoals' => $team->takengoals,
                'playedgames' => $team->playedgames,
                'winrate' => $team->winrate

            ];

            $statsBackup = new StatsBackup();
            $statsBackup->fill($data);
            $statsBackup->save();
            DB::commit();
        }
    }

    public function zweite_liga_backup_status()
    {
        ZweiteLigaBackup::query()->truncate();
        $teams = Team::where('league_id', '2')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();
            $team->guest();


            $data = [
                'team_id' => $team->id,
                'wins' => $team->wins,
                'ties' => $team->ties,
                'loses' => $team->loses,
                'points' => $team->points,
                'goals' => $team->goals,
                'takengoals' => $team->takengoals,
                'playedgames' => $team->playedgames,
                'winrate' => $team->winrate

            ];

            $zweiteLigaBackup = new ZweiteLigaBackup();
            $zweiteLigaBackup->fill($data);
            $zweiteLigaBackup->save();
            DB::commit();
        }
    }

    public function dritte_liga_backup_status()
    {
        DritteLigaBackup::query()->truncate();
        $teams = Team::where('league_id', '3')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();
            $team->guest();


            $data = [
                'team_id' => $team->id,
                'wins' => $team->wins,
                'ties' => $team->ties,
                'loses' => $team->loses,
                'points' => $team->points,
                'goals' => $team->goals,
                'takengoals' => $team->takengoals,
                'playedgames' => $team->playedgames,
                'winrate' => $team->winrate
            ];

            $dritteLigaBackup = new DritteLigaBackup();
            $dritteLigaBackup->fill($data);
            $dritteLigaBackup->save();
            DB::commit();
        }
    }
}
