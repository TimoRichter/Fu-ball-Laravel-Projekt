<?php

namespace App\Http\Controllers;

use App\League;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeagueController extends Controller
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
            'id' => 'integer'
        ]);
        /** @var League[] $leagues */
        $leagues = League::all();
        $id = $request->get('id');
        if ($id) {
            $leagues = League::where('id', $id)->get();
        }

        return view('leagues.index', compact('leagues'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('leagues.create');
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
            'association' => 'required',
            'firstgame' => 'required',
        ]);

        $league = new League([
            'association' => $request->get('association'),
            'firstgame' => $request->get('firstgame'),
            'winner' => $request->get('winner'),
            'recordplayer' => $request->get('recordplayer'),
            'recordplayergames' => $request->get('recordplayergames'),
        ]);
        $league->save();
        return redirect('/leagues')->with('sucess', 'Liga gespeichert!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return League|League[]|Collection|Model|null
     */
    public function show($id) #get
    {
        return League::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $league = League::find($id);
        return view('leagues.edit', compact('league'));
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
            'association' => 'required',
            'firstgame' => 'required',
        ]);

        $league = League::find($id);
        $league->association = $request->get('association');
        $league->firstgame = $request->get('firstgame');
        $league->winner = $request->get('winner');
        $league->recordplayer = $request->get('recordplayer');
        $league->recordplayergames = $request->get('recordplayergames');
        $league->save();

        return redirect('/leagues')->with('success', 'Liga aktualisiert!');
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
        $league = League::find($id);
        $league->delete();

        return redirect('/leagues')->with('success', 'Liga gelöscht!');
    }
}
