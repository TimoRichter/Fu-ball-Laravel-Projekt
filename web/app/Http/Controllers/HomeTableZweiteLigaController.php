<?php

namespace App\Http\Controllers;

use App\HomeTableZweiteLiga;

class HomeTableZweiteLigaController extends Controller
{
    public function index(){
        $hometable_zweitligist = HomeTableZweiteLiga::all()->sortByDesc('points');
        return view('hometable_zweite_liga.index', compact('hometable_zweitligist'));
    }
}
