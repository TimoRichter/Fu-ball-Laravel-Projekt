@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Ligadaten bearbeiten</h1>
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
            {!! Form::open(['method' => 'put','route' => ['leagues.update', $league->id]]) !!}
            <div class="form-group">
                {!! Form::label('association', 'Verband') !!}
                {!! Form::text('association', value($league->association)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('firstgame', 'Erstaustragung') !!}
                {!! Form::date('firstgame', value($league->firstgame)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('winner', 'Meister') !!}
                {!! Form::text('winner', value($league->winner)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recordplayer', 'Rekordspieler') !!}
                {!! Form::text('recordplayer', value($league->recordplayer)) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recordplayergames', 'Spiele') !!}
                {!! Form::text('recordplayergames', value($league->recordplayergames)) !!}
            </div>
            {!! Form::submit('Aktualisieren', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection



