<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
	<nav class="navbar navbar-light bg-white">
            <div class="container">
		<span class="navbar-text">
                    <img src="{{ asset('/img/logo_ edi_2.jpg') }}" alt="Logo">
		</span>
                <span class="p-4 navbar-text">
                   <h4>{{ __('Our new web address') }}</h4>
                   <h3><a href="https://www.abackuphk.com">www.abackuphk.com</a></h3>
                </span>
                <ul class="nav ml-auto align-self-end">
		    <li class="nav-item">
                        <a class="nav-link" href="{{ route(request()->route()->getName(), 'zh') }}">繁體</a>
                    </li>
		    <li class="nav-item">
                        <a class="nav-link" href="{{ route(request()->route()->getName(), 'en') }}">English</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'A-Backup') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news', app()->getLocale()) }}">{{ __('News') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rapid-test', app()->getLocale()) }}">{{ __('Rapid-Tests') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('test-booking', app()->getLocale()) }}">{{ __('Test Booking') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('free-condom', app()->getLocale()) }}">{{ __('Free Condom') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('videos', app()->getLocale()) }}">{{ __('Videos') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hiv-positive', app()->getLocale()) }}">{{ __('HIV Positive') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('join-us', app()->getLocale()) }}">{{ __('Join Us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about-us', app()->getLocale()) }}">{{ __('About Us') }}</a>
                            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
			    {{--<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>--}}
                            @if (Route::has('register'))
				{{--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>--}}
                            @endif
                        @else
			    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')
        </main>

        <footer class="py-4 bg-secondary text-light">
            <div class="container">
                @if (app()->isLocale('en'))
                    <p>Address : Flat A1, 11/F., East South Bldg., 475 - 481 Hennessy Road, Causeway Bay. Tel.：(852) 3116 7204</p>
                @else
                    <p>地址：香港銅鑼灣軒尼斯道475-481號十一字樓Ａ１室　電話：(852) 3116 7204</p>
                @endif
                <p><small>&copy; Copyright By A-Backup</small></p>
            </div>
        </footer>
    </div>
</body>
</html>
