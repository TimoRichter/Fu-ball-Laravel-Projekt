@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Spiel hinzufügen</h1>
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
                    {!! Form::open(['route' => 'games.store']) !!}
                    <div class="form-group">
                        {!! Form::label('matchday', 'Spieltag') !!}
                        {!! Form::text('matchday', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Datum') !!}
                        {!! Form::date('date', \Carbon\Carbon::now()) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('time', 'Anpfiff') !!}
                        {!! Form::time('time', \Carbon\Carbon::now()) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('home', 'Heim') !!}
                        {!! Form::select('home', $teams,null,['placeholder' => 'Heim-Verein auswählen...'], ['class'=> 'form-control'])  !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('guest', 'Gast') !!}
                        {!! Form::select('guest', $teams,null,['placeholder' => 'Gast-Verein auswählen...'], ['class'=> 'form-control'])  !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('homegoals', 'Tore-Heim') !!}
                        {!! Form::text('homegoals', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('guestgoals', 'Tore-Gast') !!}
                        {!! Form::text('guestgoals', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Hinzufügen', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
