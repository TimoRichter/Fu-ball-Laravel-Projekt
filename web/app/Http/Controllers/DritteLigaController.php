<?php

namespace App\Http\Controllers;

use App\DritteLiga;
use App\Game;
use Carbon\Carbon;

class DritteLigaController extends Controller
{
    public function index(){
        $drittligists= DritteLiga::all()->sortByDesc('points');
        foreach ($drittligists as $drittligist) {
            $actualMatchday = $drittligist->playedgames;
            continue;
        }
        $now = new Carbon();
        /** @var Game[] $gamesOfMatchday */
        $gamesOfMatchday = Game::query()->where('matchday', "=", $actualMatchday)->where('date', 'like', '%' . $now->format('Y') . '%')->get();
        return view('dritte_liga.index', ['drittligists' => $drittligists, 'gamesOfMatchday' => $gamesOfMatchday]);

    }
}
