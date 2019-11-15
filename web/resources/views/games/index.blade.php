@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Spiele</h1>
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
                    <th>Spieltag</th>
                    <th>Datum</th>
                    <th>Anpfiff</th>
                    <th>Heim</th>
                    <th>Gast</th>
                    <th>Tore-Heim</th>
                    <th>Tore-Gast</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{$game->matchday}}</td>
                        <td>{{$game->date->format('d.m.Y')}}</td>
                        <td>{{$game->time}}</td>
                        <td>{{$game->hometeams->teamname}}</td>
                        <td>{{$game->guestteams->teamname}}</td>
                        <td>{{$game->homegoals}}</td>
                        <td>{{$game->guestgoals}}</td>

                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('games.edit',$game->id)}}" class="btn btn-primary">Bearbeiten</a>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('games.destroy', $game->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary" type="submit">Löschen</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['home'=>$game->home])}}" class="btn btn-primary">Heim-Verein</a>
                            </button>
                        </td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['guest'=>$game->guest])}}" class="btn btn-primary">Gast-Verein</a>
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
