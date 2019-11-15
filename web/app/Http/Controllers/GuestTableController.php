<?php

namespace App\Http\Controllers;

use App\GuestTable;

class GuestTableController extends Controller
{
    public function index(){
        $guesttable= GuestTable::all()->sortByDesc('points');
        return view('guesttable.index',compact('guesttable'));

    }
}
