<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aston Events') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	@yield('lib')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('style')
</head>
@if (!Session::has('likes'))
	{{Session::put('likes', array())}}
@endif
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Aston Events') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						<li>
							<a class = "nav-link" href = "{{route('list.events')}}">Events</a>
						</li>
						<li>
							<a class = "nav-link" href = "{{route('about')}}">About</a>
						</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class = "dropdown-item" href = "{{route('home')}}">
		                                	{{ __('My profile') }}
		                            </a>
									<a class = "dropdown-item" href = "{{route('new.event')}}">
		                                	{{ __('New event') }}
		                            </a>
									<a class = "dropdown-item" href = "{{route('user.events')}}">
		                                	{{ __('My events') }}
		                            </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </li>
                        @endguest
						<li>
							<form id = "search-bar" class = "form-inline my-2 my-lg-0" action = "{{route('search.event')}}" method = "GET">
								<input id = "search-input" name = "query" class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search"/>
								<button class = "btn btn-outline-success my-2 my-sm-0" type = "submit">Search</button>
							</form>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
			<div class = "container">
				<div class="justify-content-center">
					<div class = "card">
						<div class = "card-header">
							@yield('header')
						</div>
						<div class = "card-body">
							@yield('content')
						</div>
						<div class = "card-footer">
							@yield('footer')
						</div>
					</div>
				</div>
			</div>
        </main>
    </div>
</body>
</html>
@yield('js')
