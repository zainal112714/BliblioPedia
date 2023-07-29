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
    <style>
        .navbar-logo {
            width: 125px;
            /* Atur lebar logo */
            height: auto;
            /* Atur tinggi logo agar tetap proporsional */
        }

        .navbar {
            background-color: #293F59;

        }

        .navbar-nav .nav-link {
            color: white;
            /* Warna teks (font) pada navbar */
            border-radius: 5px;
            /* Membuat sudut (round) pada link navigasi */
            padding: 10px 15px;
            /* Atur padding agar link navigasi lebih lebar */
        }

        .navbar-nav .nav-link:hover {
            background-color: white;
            /* Warna latar belakang ketika hover */
            color: #293F59;
            /* Warna teks ketika hover */
        }
    </style>
</head>

<body>
    @include('layouts.nav')
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('script')
</body>

</html>
