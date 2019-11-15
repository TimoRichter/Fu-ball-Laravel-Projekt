@extends('base')
@extends('navbar')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Verein hinzufügen</h1>
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
                {!! Form::open(['route' => 'teams.store']) !!}
                <div class="form-group">
                    {!! Form::label('teamname', 'Name des Vereins') !!}
                    {!! Form::text('teamname', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('league_id', 'Ligazugehörigkeit') !!}
                    {!! Form::select('league_id', $leagues,null,['placeholder' => 'Liga auswählen...'], ['class'=> 'form-control'])  !!}
                </div>

                    {!! Form::submit('Hinzufügen', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
