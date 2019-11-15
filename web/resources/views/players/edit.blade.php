@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Spielerdaten bearbeiten</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            {!! Form::open(['method' => 'put','route' => ['players.update', $player->id]]) !!}
            <div class="form-group">
                {!! Form::label('team_id', 'Verein') !!}
                {!! Form::select('team_id',$teams, value($player->team_id)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('shirtnumber', 'Trikotnummer') !!}
                {!! Form::text('shirtnumber', value($player->shirtnumber)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('playername', 'Spielername') !!}
                {!! Form::text('playername', value($player->playername)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nationality', 'Nationalität') !!}
                {!! Form::text('nationality', value($player->nationality)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('games', 'Spiele') !!}
                {!! Form::text('games', value($player->games)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('goals', 'Tore') !!}
                {!! Form::text('goals', value($player->goals)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('assists', 'Vorlagen') !!}
                {!! Form::text('assists', value($player->assists)) !!}
            </div>
            {!! Form::submit('Aktualisieren', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection



