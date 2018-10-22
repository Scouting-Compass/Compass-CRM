<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="{{ config('app.name') }}">
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title') </title>

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    </head>
    <body class="my-login-page">
        <div id="app">
            @yield('content') {{-- Page content --}}
        </div>

        {{-- Javascript --}}
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>