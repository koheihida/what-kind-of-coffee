<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="image/icon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="/css/layout.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-3-1/css/5-3-1.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>

</head>
<body>
    <div id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-mug-hot"></i>
                    {{ config('app.name', 'Laravel') }}</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <a class="navbar-brand top_btn" href="image/readme.png" data-lightbox="group"><i class="fas fa-question"></i> how to use</a>
                </div>
                <div>
                    <a class="navbar-brand" href="{{ url('/test') }}"><i class="fas fa-coffee"></i> checker</a>
                </div>
                <div>
                    <a class="navbar-brand" href="{{ url('/load') }}"><i class="fas fa-clipboard"></i>  memo</a>
                </div>
                <div>
                    <a class="navbar-brand" href="image/flavorwheel.jpg" data-lightbox="group"><i class="fas fa-chart-pie"></i> flavor wheel</a>
                </div>
                <div>
                    <a class="navbar-brand" href="{{ url('/load') }}" data-lightbox="group"><i class="fas fa-comments"></i> open space</a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </div>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <div>
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="card-body my-card-body">
        @foreach($memos as $memo)
            <div>
                <a href="/edit/{{ $memo['id'] }}" class="card-text d-block elipsis mb-2">{{ $memo['content'] }}</a>
            </div>
        @endforeach
    </div>
</body>
</html>
