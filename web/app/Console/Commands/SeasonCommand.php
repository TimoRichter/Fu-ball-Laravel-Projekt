<?php

namespace App\Console\Commands;

use App\DritteLiga;
use App\GuestTable;
use App\GuestTableDritteLiga;
use App\GuestTableZweiteLiga;
use App\HomeTable;
use App\HomeTableDritteLiga;
use App\HomeTableZweiteLiga;
use App\Stat;
use App\Team;
use App\Services\MatchService;
use App\ZweiteLiga;
use Exception as ExceptionAlias;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeasonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:create';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates stats table';
    /**
     * Create a new command instance.
     *
     * @param MatchService $match
     */
    protected $season;

    /**
     * SeasonCommand constructor.
     * @param MatchService $matchService
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
     * @throws ExceptionAlias
     */
    public function handle()
    {
        $this->erste_liga_status();
        $this->zweite_liga_status();
        $this->dritte_liga_status();
        $this->home_table_status();
        $this->guest_table_status();
        $this->home_table_zweite_liga_status();
        $this->guest_table_zweite_liga_status();
        $this->home_table_dritte_liga_status();
        $this->guest_table_dritte_liga_status();
    }

    public function erste_liga_status()
    {
        Stat::query()->truncate();
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
                'winrate' => $team->winrate,
                'standing' => $team->standing,

            ];

            $stat = new Stat();
            $stat->fill($data);
            $stat->save();
            DB::commit();
        }
    }

    public function zweite_liga_status()
    {
        ZweiteLiga::query()->truncate();
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

            $zweiteLiga = new ZweiteLiga();
            $zweiteLiga->fill($data);
            $zweiteLiga->save();
            DB::commit();
        }
    }

    public function dritte_liga_status()
    {
        DritteLiga::query()->truncate();
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

            $dritteLiga = new DritteLiga();
            $dritteLiga->fill($data);
            $dritteLiga->save();
            DB::commit();
        }
    }

    public function home_table_status()
    {
        HomeTable::query()->truncate();
        $teams = Team::where('league_id', '1')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();


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

            $homeTable = new HomeTable();
            $homeTable->fill($data);
            $homeTable->save();
            DB::commit();
        }
    }

    public function guest_table_status()
    {
        GuestTable::query()->truncate();
        $teams = Team::where('league_id', '1')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
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

            $homeTable = new GuestTable();
            $homeTable->fill($data);
            $homeTable->save();
            DB::commit();
        }
    }

    public function home_table_zweite_liga_status()
    {
        HomeTableZweiteLiga::query()->truncate();
        $teams = Team::where('league_id', '2')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();


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

            $homeTableZweiteLiga = new HomeTableZweiteLiga();
            $homeTableZweiteLiga->fill($data);
            $homeTableZweiteLiga->save();
            DB::commit();
        }
    }

    public function guest_table_zweite_liga_status()
    {
        GuestTableZweiteLiga::query()->truncate();
        $teams = Team::where('league_id', '2')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
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

            $guestTableZweiteLiga = new GuestTableZweiteLiga();
            $guestTableZweiteLiga->fill($data);
            $guestTableZweiteLiga->save();
            DB::commit();
        }
    }

    public function home_table_dritte_liga_status()
    {
        HomeTableDritteLiga::query()->truncate();
        $teams = Team::where('league_id', '3')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
            $team->home();


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

            $homeTableDritteLiga = new HomeTableDritteLiga();
            $homeTableDritteLiga->fill($data);
            $homeTableDritteLiga->save();
            DB::commit();
        }
    }

    public function guest_table_dritte_liga_status()
    {
        GuestTableDritteLiga::query()->truncate();
        $teams = Team::where('league_id', '3')->get();
        foreach ($teams as $team) {
            DB::beginTransaction();
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

            $homeTableDritteLiga = new GuestTableDritteLiga();
            $homeTableDritteLiga->fill($data);
            $homeTableDritteLiga->save();
            DB::commit();
        }
    }
}
