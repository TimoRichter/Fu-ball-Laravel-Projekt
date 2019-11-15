@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">2. Liga <br> Heim</h1>
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
                @foreach($hometable_zweitligist as $hometable_zweitligist)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$hometable_zweitligist->teams->teamname}}</td>
                        <td>{{$hometable_zweitligist->playedgames}}</td>
                        <td>{{$hometable_zweitligist->wins}}</td>
                        <td>{{$hometable_zweitligist->ties}}</td>
                        <td>{{$hometable_zweitligist->loses}}</td>
                        <td>{{$hometable_zweitligist->goals}}<?php echo ':'?>{{$hometable_zweitligist->takengoals}}</td>
                        <td><?php $k = $hometable_zweitligist->goals - $hometable_zweitligist->takengoals; echo $k?></td>
                        <td>{{$hometable_zweitligist->points}}</td>
                        <td>{{$hometable_zweitligist->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$hometable_zweitligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$hometable_zweitligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$hometable_zweitligist->team_id])}}"
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
