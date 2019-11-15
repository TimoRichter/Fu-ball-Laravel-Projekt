@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Spieldaten aktualisieren</h1>
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
            {!! Form::open(['method' => 'put','route' => ['games.update', $game->id]]) !!}
                <div class="form-group">
                    {!! Form::label('matchday', 'Spieltag') !!}
                    {!! Form::text('matchday', value($game->matchday)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date', 'Datum') !!}
                    {!! Form::date('date', value($game->date)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('time', 'Anpfiff') !!}
                    {!! Form::time('time', value($game->time)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('home', 'Heim') !!}
                    {!! Form::select('home', $teams,value($game->home))  !!}
                </div>
                <div class="form-group">
                    {!! Form::label('guest', 'Gast') !!}
                    {!! Form::select('guest', $teams,value($game->guest))  !!}
                </div>
                <div class="form-group">
                    {!! Form::label('homegoals', 'Tore-Heim') !!}
                    {!! Form::text('homegoals', value($game->homegoals)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('guestgoals', 'Tore-Gast') !!}
                    {!! Form::text('guestgoals', value($game->guestgoals)) !!}
                </div>
            {!! Form::submit('Aktualisieren', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection



