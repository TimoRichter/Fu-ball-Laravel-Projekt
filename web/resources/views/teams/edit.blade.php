@extends('base')
@extends('navbar')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Teamdaten bearbeiten</h1>
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
            {!! Form::open(['method' => 'put','route' => ['teams.update', $team->id]]) !!}
            <div class="form-group">
                {!! Form::label('teamname', 'Name des Vereins') !!}
                {!! Form::text('teamname', value($team->teamname)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('league_id', 'Ligazugehörigkeit') !!}
                {!! Form::select('league_id', $leagues, value($team->league_id)) !!}
            </div>
            {!! Form::submit('Aktualisieren', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
