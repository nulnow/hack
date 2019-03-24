<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pinder.ru</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.cit.api.here.com/v3/3.0/mapsjs-mapevents.js" type="text/javascript" ></script>
    <script src="https://js.cit.api.here.com/v3/3.0/mapsjs-places.js" type="text/javascript" ></script>

    @if (Auth::check())
        <script>

            var user = <?php

                $user = Auth::user();
                $user->options_json = \json_decode($user->options_json);

                echo \json_encode($user);

                ?>;

            var users = <?php

                $users = \App\User::all();
                foreach ($users as $user) {
                    $user->options_json = \json_decode($user->options_json);
                }
                echo \json_encode($users);

                ?>;

        </script>
    @endif
    <style>
        h3 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        
    <header>
        <nav>
            <div class="nav-container">
                <div class="nav-left">
                    <div class="nav__item nav__logo">
                        <h3>Pinder.ru</h3>
                    </div>
                </div>
                <div class="nav-middle">
                </div>
                <div class="nav-right">
                    <div class="navigation-menu">
                        @guest
                            <div class="navigation-menu-item"><a href="{{ route('login') }}">Вход</a></div>
                            <div class="navigation-menu-item"><a href="{{ route('register') }}">Регистрация</a></div>
                        @else
                            <div class="navigation-menu-item"><a href="{{ route('welcome') }}">Найти</a></div>
                            <div class="navigation-menu-item"><a href="{{ route('updatePreferences') }}">Профиль <small>({{ Auth::user()->name }})</small> </a></div>
                            <div class="navigation-menu-item"><a href="{{ route('invites') }}">Приглашения</a></div>
                            <div class="navigation-menu-item"><a href="/logout">Выход</a></div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </header>

        <br>

        @if(session()->has('message'))
            <br><br><br>
            <div class="container">
                <div class="alert alert-{{ json_decode(session()->get('message'), true)['type'] }} alert-dismissible fade show" role="alert">
                    {{ json_decode(session()->get('message'), true)['text'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <main style="margin-top: 41px">
            @yield('content')
        </main>
    </div>
</body>
</html>
