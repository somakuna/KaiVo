<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'KaiVo') }}</title>
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
		<link rel="manifest" href="img/favicon/site.webmanifest">
		<link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#00aba9">
		<meta name="theme-color" content="#005767">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css"> 
		@routes
		<!-- Scripts --> 
		@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-expand-lg bg-white shadow-sm">
				<div class="container-fluid">
					<a class="navbar-brand" href="{{ route('home') }}">KaiVo</a>
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
										<a class="dropdown-item" href="{{ route('tour.create') }}">
											<i class="bi bi-plus-square"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('tour.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('report.create', 'tours') }}">
											<i class="bi bi-journals"></i> Report 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('tourService.index') }}">
											<i class="bi bi-car-front"></i> Tour Services 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('tourPickupPoint.index') }}">
											<i class="bi bi-geo"></i> Tour Pickup Points 
                                        </a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bike</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('bike.create') }}">
											<i class="bi bi-plus-square"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('bike.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('report.create', 'bikes') }}">
											<i class="bi bi-journals"></i> Report 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('bikeService.index') }}">
											<i class="bi bi-bicycle"></i> Bike Services 
                                        </a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Breakfast</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('breakfast.create') }}">
											<i class="bi bi-plus-square"></i> Create 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('breakfast.index') }}">
											<i class="bi bi-list-task"></i> List 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('report.create', 'breakfasts') }}">
											<i class="bi bi-journals"></i> Report 
                                        </a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('breakfastService.index') }}">
											<i class="bi bi-egg-fried"></i> Breakfast Services 
                                        </a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('breakfastLocation.index') }}">
											<i class="bi bi-geo"></i> Breakfast Locations 
                                        </a>
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
						<form class="d-flex" method="POST" action="{{ route('report.fast') }}" role="search" enctype="multipart/form-data"> @csrf <input type="text" name="number" class="form-control me-2" placeholder="Number (ex. 2 or 99)" required />
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