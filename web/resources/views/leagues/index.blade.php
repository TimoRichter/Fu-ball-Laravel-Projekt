@extends('base')
@extends('navbar')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Ligen</h1>
            <div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Verband</th>
                    <th>Erstaustragung</th>
                    <th>Meister</th>
                    <th>Rekordspieler</th>
                    <th>Spiele</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leagues as $league)
                    <tr>
                        <td>{{$league->association}}</td>
                        <td>{{$league->firstgame->format('d.m.Y')}}</td>
                        <td>{{$league->winnername()}}</td>
                        <td>{{$league->recordplayer}}</td>
                        <td>{{$league->recordplayergames}}</td>
                        <td>
                            <button class="btn" type="button">
                                <a href="{{ route('leagues.edit',$league->id)}}" class="btn btn-primary">Bearbeiten</a>
                            </button>
                        </td>
                        <td>
                            <button class="btn" type="button" style="margin-left: -40px">
                                <a href="{{ route('teams.index', ['league_id'=>$league->id])}}" class="btn btn-primary">Vereine</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </div>$
    </div>
@endsection
