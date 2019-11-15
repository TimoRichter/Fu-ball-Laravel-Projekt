@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">2. Liga <br> Auswärts</h1>
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
                @foreach($guesttable_zweitligist as $guesttable_zweitligist)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$guesttable_zweitligist->teams->teamname}}</td>
                        <td>{{$guesttable_zweitligist->playedgames}}</td>
                        <td>{{$guesttable_zweitligist->wins}}</td>
                        <td>{{$guesttable_zweitligist->ties}}</td>
                        <td>{{$guesttable_zweitligist->loses}}</td>
                        <td>{{$guesttable_zweitligist->goals}}<?php echo ':'?>{{$guesttable_zweitligist->takengoals}}</td>
                        <td><?php $k = $guesttable_zweitligist->goals - $guesttable_zweitligist->takengoals; echo $k?></td>
                        <td>{{$guesttable_zweitligist->points}}</td>
                        <td>{{$guesttable_zweitligist->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$guesttable_zweitligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$guesttable_zweitligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$guesttable_zweitligist->team_id])}}"
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
