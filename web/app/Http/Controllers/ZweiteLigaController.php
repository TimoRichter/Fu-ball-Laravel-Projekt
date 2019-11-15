<?php

namespace App\Http\Controllers;

use App\Game;
use App\ZweiteLiga;
use Carbon\Carbon;


class ZweiteLigaController extends Controller
{
    public function index()
    {
        $zweitligists = ZweiteLiga::all()->sortByDesc('points');
        foreach ($zweitligists as $zweitligist) {
            $actualMatchday = $zweitligist->playedgames;
            continue;
        }
        $now = new Carbon();
        /** @var Game[] $gamesOfMatchday */
        $gamesOfMatchday = Game::query()->where('matchday', "=", $actualMatchday)->where('date', 'like', '%' . $now->format('Y') . '%')->get();
        return view('zweite_liga.index', ['zweitligists' => $zweitligists, 'gamesOfMatchday' => $gamesOfMatchday]);

    }

}


