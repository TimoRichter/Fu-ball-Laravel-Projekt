@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Spieler</h1>
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
                    <th>Spielername</th>
                    <th>Verein</th>
                    <th>Trikotnummer</th>
                    <th>Nationalität</th>
                    <th>Spiele</th>
                    <th>Tore</th>
                    <th>Vorlagen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{$player->playername}}</td>
                        <td>{{$player->teams->teamname}}</td>
                        <td>{{$player->shirtnumber}}</td>
                        <td>{{$player->nationality}}</td>
                        <td>{{$player->games}}</td>
                        <td>{{$player->goals}}</td>
                        <td>{{$player->assists}}</td>
                        <td>
                            <button class="btn" type="button">
                                <a href="{{ route('players.edit',$player->id)}}" class="btn btn-primary">Bearbeiten</a>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('players.destroy', $player->id)}}" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary" type="submit">Löschen</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn" type="button">
                                <a href="{{ route('teams.index', ['id'=>$player->team_id])}}" class="btn btn-primary">
                                    Verein
                                </a>
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
