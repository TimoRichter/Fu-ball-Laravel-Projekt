@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">3. Fußball-Bundesliga-Tabelle</h1>

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
                @foreach($drittligists as $drittligist)
                    <tr>
                        <td>@if($i <= 2) <span style="color: #4A9303"> <i class="fas fa-caret-up fa-lg"></i></span>
                            @elseif($i == 3) <span style="color: #F57100"><i class="fas fa-minus"></i></span>
                            @elseif($i >= 17 ) <span style="color: #E50D0D"> <i
                                        class="fas fa-caret-down fa-lg"></i></span>
                            @endif</td>
                        <td>@if($i <= 2) <span style="background-color: #4A9303; color: white"> <?php echo $i++ ?> </span>
                            @elseif($i == 3) <span style="background-color: #F57100; color: white" > <?php echo $i++ ?> </span>
                            @elseif($i >= 17 ) <span style="background-color: #E50D0D; color: white"> <?php echo $i++ ?> </span>
                            @else <span style="background-color: #B5B5B5; color: white"> <?php echo $i++ ?> </span>
                            @endif</td>
                        <td>{{$drittligist->teams->teamname}}</td>
                        <td>{{$drittligist->playedgames}}</td>
                        <td>{{$drittligist->wins}}</td>
                        <td>{{$drittligist->ties}}</td>
                        <td>{{$drittligist->loses}}</td>
                        <td>{{$drittligist->goals}}<?php echo ':'?>{{$drittligist->takengoals}}</td>
                        <td><?php $k = $drittligist->goals - $drittligist->takengoals; echo $k?></td>
                        <td>{{$drittligist->points}}</td>
                        <td>{{$drittligist->winrate}}<?php echo '%' ?></td>
                        <td>
                            <button class="btn " type="button">
                                <a href="{{ route('teams.index', ['id'=>$drittligist->team_id])}}"
                                   class="btn btn-primary">Verein</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('players.index', ['team_id'=>$drittligist->team_id])}}"
                                   class="btn btn-primary">Spieler</a>
                            </button>
                            <button class="btn " type="button">
                                <a href="{{ route('games.index', ['spiele'=>$drittligist->team_id])}}"
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
                    @if ($id >=37 )
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
