<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) #get
    {
        $request->validate([
            'spiele' => 'integer'
        ]);
        $games = Game::all();
        $spiele = $request->get('spiele');
        if ($spiele) {
            $games = Game::where('home', $spiele)->orWhere('guest', $spiele)->orderBy('matchday', 'asc')->get();
        }
        return view('games.index', compact('games'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teams = Team::all()->pluck('teamname', 'id');
        return view('games.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) #post
    {
        $request->validate([
            'matchday' => 'required',
            'date' => 'required',
            'time' => 'required',
            'home' => "required",
            'guest' => "required",
            'homegoals' => 'required|integer',
            'guestgoals' => 'required|integer',

        ]);

        $game = new Game([
            'matchday' => $request->get('matchday'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'home' => $request->get('home'),
            'guest' => $request->get('guest'),
            'homegoals' => $request->get('homegoals'),
            'guestgoals' => $request->get('guestgoals'),
        ]);
        $game->save();
        \Artisan::call('stats:create');
        return redirect('/games')->with('sucess', 'Spiel gespeichert!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Game|Game[]|Collection|Model|null
     */
    public function show($id) #get
    {
        return Game::find($id);
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
        $game = Game::find($id);
        return view('games.edit', compact('game', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) #put
    {
        $request->validate([
            'matchday' => 'required',
            'date' => 'required',
            'time' => 'required',
            'home' => "required",
            'guest' => "required",
            'homegoals' => 'required',
            'guestgoals' => 'required',
        ]);

        $game = Game::find($id);
        $game->matchday = $request->get('matchday');
        $game->date = $request->get('date');
        $game->time = $request->get('time');
        $game->home = $request->get('home');
        $game->guest = $request->get('guest');
        $game->homegoals = $request->get('homegoals');
        $game->guestgoals = $request->get('guestgoals');
        $game->save();

        \Artisan::call('s:c');
        return redirect('/games')->with('success', 'Spiel aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id) #delete
    {
        $game = Game::find($id);
        $game->delete();

        return redirect('/games')->with('success', 'Spiel gelöscht!');
    }
}
