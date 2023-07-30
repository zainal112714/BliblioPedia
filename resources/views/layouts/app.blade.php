<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blibliopedia') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
<<<<<<< HEAD
    <div id="app">
        @include('layouts.nav')
        @yield('content')
        @vite('resources/js/app.js')
        @stack('scripts')
    </div>
=======
    @include('layouts.nav')
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('script')
>>>>>>> 7e1247fc9cf208270c94f1e8a59755a0217d163f
</body>

</html>
