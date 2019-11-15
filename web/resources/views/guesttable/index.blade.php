@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">1. Liga <br> Auswärts</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Verein</th>
                    <th>SP</th>
                    <th>S</th>
                    <th>U</th>
                    <th>N</th>
                    <th>Tore</th>
                    <th>TD</th>
                    <th>Pkte</th>
                    <th>WR</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1?>
                @foreach($guesttable as $guesttable)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$guesttable->teams->teamname}}</td>
                        <td>{{$guesttable->playedgames}}</td>
                        <td>{{$guesttable->wins}}</td>
                        <td>{{$guesttable->ties}}</td>
                        <td>{{$guesttable->loses}}</td>
                        <td>{{$guesttable->goals}}<?php echo ':'?>{{$guesttable->takengoals}}</td>
                        <td><?php $k = $guesttable->goals - $guesttable->takengoals; echo $k?></td>
                        <td>{{$guesttable->points}}</td>
                        <td>{{$guesttable->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$guesttable->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$guesttable->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$guesttable->team_id])}}"
                                   class="btn btn-primary">Spiele</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
