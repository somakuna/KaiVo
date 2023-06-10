<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KayVo') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
    
    @routes
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav">
                        <li class="nav-item m-1">
                            <a class="btn btn-secondary text-white" href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="btn btn-primary text-white" href="{{ route('tours.create') }}"><i class="bi bi-plus-square"></i> Tour</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="btn btn-forest text-white" href="{{ route('tours.create') }}"><i class="bi bi-plus-square"></i> Bike</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="btn btn-violet text-white" href="{{ route('tours.create') }}"><i class="bi bi-plus-square"></i> Breakfast</a>
                        </li>
                        <li class="nav-item m-1">
                            <form class="d-flex" method="POST" action="{{ route('search') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="number" class="form-control" placeholder="Number (ex. 2 or 99)" required /> 
                                    <select class="form-select" name="type" id="name" required>
                                        <option value="" selected disabled>Select an option</option>
                                        <option value="1">Tour Voucher</option>
                                        <option value="2">Bike Voucher</option>
                                        <option value="3">Breakfast Voucher</option>
                                    </select>
                                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </li>

                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

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

        <main class="py-4">
            @include('partials.response')
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
</body>
</html>
