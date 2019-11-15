@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Liga hinzufügen</h1>
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
                {!! Form::open(['route' =>'leagues.store']) !!}
                <div class="form-group">
                    {!! Form::label('association', 'Verband') !!}
                    {!! Form::text('association', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('firstgame', 'Erstaustragung') !!}
                    {!! Form::date('firstgame', \Carbon\Carbon::now()) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('winner', 'Meister') !!}
                    {!! Form::text('winner', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('recordplayer', 'Rekordspieler') !!}
                    {!! Form::text('recordplayer', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('recordplayergames', 'Spiele') !!}
                    {!! Form::text('recordplayergames', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Hinzufügen', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
