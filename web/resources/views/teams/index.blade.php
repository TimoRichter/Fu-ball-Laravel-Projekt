@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3"> Vereine</h1>
            <div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Liga</th>

                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{$team->teamname}}</td>
                        <td>{{$team->leagues->association}}</td>
                        <td>
                            <button class="btn" type="button" style="margin-right: -40px">
                                <a href="{{ route('teams.edit',$team->id)}}" class="btn btn-primary">Bearbeiten</a>
                            </button>
                        </td>

                        <td>
                            <button class="btn" type="button">
                                <a href="{{ route('leagues.index', ['id'=>$team->league_id])}}" class="btn btn-primary">Liga</a>
                            </button>
                        </td>
                        <td>
                            <button class="btn " type="button" style="margin-left: -40px">
                                <a href="{{ route('players.index', ['team_id'=>$team->id])}}" class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn" type="button">
                                <a href="{{ route('games.index', ['spiele'=>$team->id])}}" class="btn btn-primary">Spiele</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>
@endsection
