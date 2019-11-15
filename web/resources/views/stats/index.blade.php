@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Fußball-Bundesliga-Tabelle</h1>

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
                @foreach($erstligists as $erstligist)
                    <tr>
                        <td>
                            @if($i == 16) <span style="color:  #F57100"><i class="fas fa-minus"></i>
                                 </span>
                            @elseif($i >= 17 ) <span style="color: #E50D0D"> <i
                                    class="fas fa-caret-down fa-lg"></i></span>
                            @endif </td>
                        <td>
                            @if($i == 16) <span
                                style="background-color: #F57100; color: white"> <?php echo $i++ ?> </span>
                            @elseif($i >= 17 ) <span
                                style="background-color: #E50D0D; color: white"> <?php echo $i++ ?> </span>
                            @else <span style="background-color: #B5B5B5; color: white"> <?php echo $i++ ?> </span>
                            @endif </td>
                        <td>{{$erstligist->teams->teamname}}</td>
                        <td>{{$erstligist->playedgames}}</td>
                        <td>{{$erstligist->wins}}</td>
                        <td>{{$erstligist->ties}}</td>
                        <td>{{$erstligist->loses}}</td>
                        <td>{{$erstligist->goals}}<?php echo ':'?>{{$erstligist->takengoals}}</td>
                        <td><?php $k = $erstligist->goals - $erstligist->takengoals; echo $k?></td>
                        <td>{{$erstligist->points}}</td>
                        <td>{{$erstligist->winrate }}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$erstligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$erstligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$erstligist->team_id])}}"
                                   class="btn btn-primary">Spiele</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="spieltag">
            <h2><b>Letzten Spiele</b></h2>
            <table class="table table-striped">
                <tr>
                    <th>Spieltag</th>
                    <th style="padding-left: 75px">Heim</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style=" padding-left: 50px; padding-right: 30px; margin-left: -50px  ">Gast</th>
                </tr>
                @foreach($gamesOfMatchday as $game)
                    <?php $id = $game->home?>
                    @if ($id <= 18)
                            <tr>
                                <td align="center" style="padding-right: 100px">{{$game->matchday}} </td>
                                <td> {{$game->homename()}} </td>
                                <td>{{$game->homegoals}}</td>
                                <td>:</td>
                                <td>{{$game->guestgoals}}</td>
                                <td align="left" style="padding-right: 30px; padding-left: 30px "> {{$game->gastname()}}</td>
                            </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>

@endsection
