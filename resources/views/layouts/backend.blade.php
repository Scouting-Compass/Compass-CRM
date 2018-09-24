<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- CSRF Token --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                        <ul class="navbar-nav mr-auto">
                            @if ($authUser->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">Tenants</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('calendar.index') }}" class="nav-link">Calendar</a>
                                </li>
                            @endif
                        </ul>

                        {{-- Right Side Of Navbar --}}
                        <ul class="navbar-nav ml-auto">
                            {{-- Authentication Links --}}
                            @guest {{-- user is not authenticated --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </li>
                            @else {{-- User is authenticated --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ $authUser->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.settings') }}"><i class="fe fe-sliders mr-1 tw-text-grey-darker"></i> Settings</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fe fe-power mr-1 tw-text-red"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf {{-- Form field protection --}}
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

            <footer class="footer">
                <div class="container">
                    <span class="text-muted">&copy; {{ config('app.name') }}</span>
    
                    <div class="float-right">
                        <a href="" class="no-underline text-muted">Privacy</a>
                        <span class="text-muted">|</span>
                        <a href="" class="no-underline text-muted">Terms of Service</a>
                        <span class="text-muted">|</span>
                        <a target="_blank" href="https://github.com/Scouting-Compass/Compass.app" class="no-underline text-muted">Github</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
