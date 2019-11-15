@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">1. Liga <br> Heim</h1>
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
                @foreach($hometable as $hometable)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$hometable->teams->teamname}}</td>
                        <td>{{$hometable->playedgames}}</td>
                        <td>{{$hometable->wins}}</td>
                        <td>{{$hometable->ties}}</td>
                        <td>{{$hometable->loses}}</td>
                        <td>{{$hometable->goals}}<?php echo ':'?>{{$hometable->takengoals}}</td>
                        <td><?php $k = $hometable->goals - $hometable->takengoals; echo $k?></td>
                        <td>{{$hometable->points}}</td>
                        <td>{{$hometable->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$hometable->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$hometable->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$hometable->team_id])}}"
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
