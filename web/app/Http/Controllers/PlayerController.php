<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'team_id' => 'integer'
        ]);
        $players = Player::all();
        $team_id = $request->get('team_id');
        if ($team_id) {
            $players = Player::where('team_id', $team_id)->orderBy('shirtnumber', 'asc')->get();
        }
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teams= Team::all()->pluck('teamname','id');
        return view('players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'shirtnumber' => 'required',
            'playername' => 'required',
            'nationality' => 'required',
            'games' => 'required',
            'goals' => 'required',
            'assists' => 'required'
        ]);

        $player = new Player([
            'team_id' => $request->get('team_id'),
            'shirtnumber' => $request->get('shirtnumber'),
            'playername' => $request->get('playername'),
            'nationality' => $request->get('nationality'),
            'games' => $request->get('games'),
            'goals' => $request->get('goals'),
            'assists' => $request->get('assists')
        ]);
        $player->save();
        return redirect('/players')->with('sucess', 'Spieler gespeichert!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Player|Player[]|Collection|Model|null
     */
    public function show($id)
    {
        return Player::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $teams = Team::all()->pluck('teamname', 'id');
        $player = Player::find($id);
        return view('players.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'team_id' => 'required',
            'shirtnumber' => 'required',
            'playername' => 'required',
            'nationality' => 'required',
            'games' => 'required',
            'goals' => 'required',
            'assists' => 'required',
        ]);

        $player = Player::find($id);
        $player->team_id = $request->get('team_id');
        $player->shirtnumber = $request->get('shirtnumber');
        $player->playername = $request->get('playername');
        $player->nationality = $request->get('nationality');
        $player->games = $request->get('games');
        $player->goals = $request->get('goals');
        $player->assists = $request->get('assists');
        $player->save();

        return redirect('/players')->with('success', 'Spieler aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();

        return redirect('/players')->with('success', 'Spieler gelöscht!');
    }
}
