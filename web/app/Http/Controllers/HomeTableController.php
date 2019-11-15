<?php

namespace App\Http\Controllers;

use App\HomeTable;

class HomeTableController extends Controller
{
    public function index(){
        $hometable = HomeTable::all()->sortByDesc('points');
        return view('hometable.index', compact('hometable'));
    }
}
