<?php

namespace App\Http\Controllers;

use App\HomeTableDritteLiga;

class HomeTableDritteLigaController extends Controller
{
    public function index(){
        $hometable_drittligist = HomeTableDritteLiga::all()->sortByDesc('points');
        return view('hometable_dritte_liga.index', compact('hometable_drittligist'));
    }
}
