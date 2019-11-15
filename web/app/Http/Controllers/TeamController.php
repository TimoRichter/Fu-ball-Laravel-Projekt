<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource..
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) #get im postman
    {
        $request->validate([
            'league_id' => 'integer',
            'id' => 'integer',
            'home' => 'integer',
            'guest' => 'integer'
        ]);
        $teams = Team::all();
        $league_id = $request->get('league_id');
        $id = $request->get('id');
        $home = $request->get('home');
        $guest = $request->get('guest');
        if ($league_id) {
            $teams = Team::where('league_id', $league_id)->get();
        }
        if ($id) {
            $teams = Team::where('id', $id)->get();
        }
        if ($home) {
            $teams = Team::where('id', $home)->get();
        }
        if ($guest) {
            $teams = Team::where('id', $guest)->get();
        }
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $leagues = League::all()->pluck('association', 'id');
        return view('teams.create', compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) #post im postman
    {

        $request->validate([
            'teamname' => 'required',
            'league_id' => 'required',
        ]);
        $team = new Team([
            'teamname' => $request->get('teamname'),
            'league_id' => $request->get('league_id'),
        ]);
        $team->save();
        return redirect('/teams')->with('sucess', 'Verein gespeichert!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Team|Team[]|Collection|Model|null
     */
    public function show($id) #get im postman
    {
        return Team::find($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $leagues = League::all()->pluck('association', 'id');
        $team = Team::find($id);
        return view('teams.edit', compact('team', 'leagues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) #put im postman
    {
        $request->validate([
            'teamname' => 'required',
            'league_id' => "required",
        ]);

        $team = Team::find($id);
        $team->teamname = $request->get('teamname');
        $team->league_id = $request->get('league_id');
        $team->save();

        return redirect('/teams')->with('success', 'Verein aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id) #delete im postman
    {
        $team = Team::find($id);
        $team->delete();

        return redirect('/teams')->with('success', 'Verein gelöscht!');

    }
}
