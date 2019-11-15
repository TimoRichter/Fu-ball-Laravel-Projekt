<?php

namespace App\Http\Controllers;

use App\StatsBackup;

class StatsBackupController extends Controller
{
    public function index(){
        $statsBackup= StatsBackup::all()->sortByDesc('points_backup');
        return view('stats.index',compact('statsBackup'));

    }
}
