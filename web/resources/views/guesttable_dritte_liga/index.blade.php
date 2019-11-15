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
                @foreach($guesttable_drittligist as $guesttable_drittligist)
                    <tr>
                        <td></td>
                        <td><?php echo " ".$i++ ?></td>
                        <td>{{$guesttable_drittligist->teams->teamname}}</td>
                        <td>{{$guesttable_drittligist->playedgames}}</td>
                        <td>{{$guesttable_drittligist->wins}}</td>
                        <td>{{$guesttable_drittligist->ties}}</td>
                        <td>{{$guesttable_drittligist->loses}}</td>
                        <td>{{$guesttable_drittligist->goals}}<?php echo ':'?>{{$guesttable_drittligist->takengoals}}</td>
                        <td><?php $k = $guesttable_drittligist->goals - $guesttable_drittligist->takengoals; echo $k?></td>
                        <td>{{$guesttable_drittligist->points}}</td>
                        <td>{{$guesttable_drittligist->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$guesttable_drittligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$guesttable_drittligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$guesttable_drittligist->team_id])}}"
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
