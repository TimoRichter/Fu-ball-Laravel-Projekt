<?php

namespace App\Http\Controllers;

use App\Game;
use App\Stat;
use App\Team;
use App\ZweiteLiga;
use Carbon\Carbon;

/**
 *
 *
 *
 *
 *
 */
class StatController extends Controller
{

    public function index()
    {
        $erstligists = Stat::all()->sortByDesc('points');
        $actualMatchday = 1;
        foreach ($erstligists as $erstligist) {
            $actualMatchday = $erstligist->playedgames;
            continue;
        }
        $now = new Carbon();
        /** @var Game[] $gamesOfMatchday */
        $gamesOfMatchday = Game::query()->where('matchday', "=", $actualMatchday)->where('date', 'like', '%' . $now->format('Y') . '%')->get();
        return view('stats.index', ['erstligists' => $erstligists, 'gamesOfMatchday' => $gamesOfMatchday]);

    }






}
