@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Spieler hinzufügen</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                    {!! Form::open(['route' => 'players.store']) !!}
                    <div class="form-group">
                        {!! Form::label('team_id', 'Verein') !!}
                        {!! Form::select('team_id', $teams,null,['placeholder' => 'Verein auswählen...'], ['class'=> 'form-control'])  !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('shirtnumber', 'Trikotnummer') !!}
                        {!! Form::text('shirtnumber', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('playername', 'Spielername') !!}
                        {!! Form::text('playername', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nationality', 'Nationalität') !!}
                        {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('games', 'Spiele') !!}
                        {!! Form::text('games', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('goals', 'Tore') !!}
                        {!! Form::text('goals', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('assists', 'Vorlagen') !!}
                        {!! Form::text('assists', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Hinzufügen', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
