@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">3. Liga <br> Heim</h1>
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
                @foreach($hometable_drittligist as $hometable_drittligist)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$hometable_drittligist->teams->teamname}}</td>
                        <td>{{$hometable_drittligist->playedgames}}</td>
                        <td>{{$hometable_drittligist->wins}}</td>
                        <td>{{$hometable_drittligist->ties}}</td>
                        <td>{{$hometable_drittligist->loses}}</td>
                        <td>{{$hometable_drittligist->goals}}<?php echo ':'?>{{$hometable_drittligist->takengoals}}</td>
                        <td><?php $k = $hometable_drittligist->goals - $hometable_drittligist->takengoals; echo $k?></td>
                        <td>{{$hometable_drittligist->points}}</td>
                        <td>{{$hometable_drittligist->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$hometable_drittligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$hometable_drittligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$hometable_drittligist->team_id])}}"
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
