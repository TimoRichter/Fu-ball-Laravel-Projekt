<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item teams @if( Route::current()->getName() == 'teams.index') active @endif">
            <a class="nav-link" href="{{ route('teams.index') }}">Vereine</a>
        </li>
        <li class="nav-item players @if( Route::current()->getName() == 'players.index') active @endif">
            <a class="nav-link" href="{{ route ('players.index') }}">Spieler</a>
        </li>
        <li class="nav-item games @if( Route::current()->getName() == 'games.index') active @endif ">
            <a class="nav-link" href="{{ route ('games.index') }}">Spiele</a>
        </li>
        <li class="nav-item leagues @if( Route::current()->getName() == 'leagues.index') active @endif ">
            <a class="nav-link" href="{{ route ('leagues.index') }}">Ligen</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown @if( Route::current()->getName() == 'stats.index' || Route::current()->getName() =='zweite_liga.index' || Route::current()->getName() =='dritte_liga.index' ) active @endif ">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Tabellen
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('stats.index')}}">1. Liga</a>
                <a class="dropdown-item" href="{{ route('zweite_liga.index')}}">2. Liga</a>
                <a class="dropdown-item" href="{{ route('dritte_liga.index')}}">3. Liga</a>
            </div>
        </li>

        @if( Route::current()->getName() == 'stats.index' or Route::current()->getName() == 'hometable.index'  or Route::current()->getName() == 'guesttable.index')
            <li class="nav-item hometable hide-navigation-item  @if( Route::current()->getName() == 'stats.index' or Route::current()->getName() == 'hometable.index') active @endif ">
                <a class="nav-link" href="{{ route ('hometable.index') }}">Heim</a>
            </li>
        @endif
        @if( Route::current()->getName() == 'stats.index' or Route::current()->getName() == 'hometable.index'  or Route::current()->getName() == 'guesttable.index')
            <li class="nav-item hometable hide-navigation-item @if( Route::current()->getName() == 'stats.index' or Route::current()->getName() == 'guesttable.index') active @endif ">
                <a class="nav-link" href="{{ route ('guesttable.index') }}">Auswärts</a>
            </li>
        @endif

        @if( Route::current()->getName() == 'zweite_liga.index' or Route::current()->getName() == 'hometable_zweite_liga.index'  or Route::current()->getName() == 'guesttable_zweite_liga.index')
            <li class="nav-item hometable hide-navigation-item  @if( Route::current()->getName() == 'zweite_liga.index' or Route::current()->getName() == 'hometable_zweite_liga.index') active @endif ">
                <a class="nav-link" href="{{ route ('hometable_zweite_liga.index') }}">Heim</a>
            </li>
        @endif
        @if( Route::current()->getName() == 'zweite_liga.index' or Route::current()->getName() == 'hometable_zweite_liga.index'  or Route::current()->getName() == 'guesttable_zweite_liga.index')
            <li class="nav-item hometable hide-navigation-item @if( Route::current()->getName() == 'zweite_liga.index' or Route::current()->getName() == 'guesttable_zweite_liga.index') active @endif ">
                <a class="nav-link" href="{{ route ('guesttable_zweite_liga.index') }}">Auswärts</a>
            </li>
        @endif

        @if( Route::current()->getName() == 'dritte_liga.index' or Route::current()->getName() == 'hometable_dritte_liga.index'  or Route::current()->getName() == 'guesttable_dritte_liga.index')
            <li class="nav-item hometable hide-navigation-item  @if( Route::current()->getName() == 'dritte_liga.index' or Route::current()->getName() == 'hometable_dritte_liga.index') active @endif ">
                <a class="nav-link" href="{{ route ('hometable_dritte_liga.index') }}">Heim</a>
            </li>
        @endif
        @if( Route::current()->getName() == 'dritte_liga.index' or Route::current()->getName() == 'hometable_dritte_liga.index'  or Route::current()->getName() == 'guesttable_dritte_liga.index')
            <li class="nav-item hometable hide-navigation-item @if( Route::current()->getName() == 'dritte_liga.index' or Route::current()->getName() == 'guesttable_dritte_liga.index') active @endif ">
                <a class="nav-link" href="{{ route ('guesttable_dritte_liga.index') }}">Auswärts</a>
            </li>
        @endif

        <li class="nav-item dropdown @if( Route::current()->getName() == 'teams.create' || Route::current()->getName() =='players.create' || Route::current()->getName() =='games.create' ) active @endif">
            <a class="nav-link dropdown-toggle"  href="#" id="navbardrop" data-toggle="dropdown">
                Neu
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('teams.create')}}">Verein</a>
                <a class="dropdown-item" href="{{ route('players.create')}}">Spieler</a>
                <a class="dropdown-item" href="{{ route('games.create')}}">Spiel</a>
            </div>
        </li>
    </ul>
</nav>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
