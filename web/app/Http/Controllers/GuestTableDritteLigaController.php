<?php

namespace App\Http\Controllers;

use App\GuestTableDritteLiga;

class GuestTableDritteLigaController extends Controller
{
    public function index(){
        $guesttable_drittligist= GuestTableDritteLiga::all()->sortByDesc('points');
        return view('guesttable_dritte_liga.index',compact('guesttable_drittligist'));

    }
}
