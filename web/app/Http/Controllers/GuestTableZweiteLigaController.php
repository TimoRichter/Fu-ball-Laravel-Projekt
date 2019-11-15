<?php

namespace App\Http\Controllers;

use App\GuestTableZweiteLiga;

class GuestTableZweiteLigaController extends Controller
{
    public function index(){
        $guesttable_zweitligist= GuestTableZweiteLiga::all()->sortByDesc('points');
        return view('guesttable_zweite_liga.index',compact('guesttable_zweitligist'));

    }
}
