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
		<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css"> @routes
		<!-- Scripts --> @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-expand-lg bg-white shadow-sm">
				<div class="container-fluid">
					<a class="navbar-brand" href="{{ route('home') }}">KayVo</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tour </a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('tours.create') }}">
											<i class="bi bi-plus-lg"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('tours.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="#">Something else here</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bike</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('bikes.create') }}">
											<i class="bi bi-plus-lg"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('bikes.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="#">Something else here</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Breakfast</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('breakfasts.create') }}">
											<i class="bi bi-plus-lg"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('breakfasts.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="#">Something else here</a>
									</li>
								</ul>
							</li>
                            @endauth
                            @guest 
                            @if (Route::has('login')) 
                            <li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li> 
                            @endif 
                            @if (Route::has('register')) <li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li> 
                            @endif 
                            @else 
                            <li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
								</div>
							</li> 
                            @endguest
						</ul>
                        @auth
						<form class="d-flex" method="POST" action="{{ route('search') }}" role="search" enctype="multipart/form-data"> @csrf <input type="text" name="number" class="form-control me-2" placeholder="Number (ex. 2 or 99)" required />
							<select class="form-select me-2" name="type" id="name" required>
								<option value="" selected disabled>Select an option</option>
								<option value="1">Tour Voucher</option>
								<option value="2">Bike Voucher</option>
								<option value="3">Breakfast Voucher</option>
							</select>
							<button class="btn btn-outline-success" type="submit">
								<i class="bi bi-search"></i>
							</button>
						</form>
                        @endauth
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