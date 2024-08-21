<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tired of the same application? Want to try to create something unique and personal? The Fun CRUD Web is the answer! With this website, you can easily create your own tables, as you like and as creatively as possible!">

    <title>CRUD App @if(View::hasSection('title')) | @yield('title') @endif</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo.svg') }}" type="image/svg+xml">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full">
    @if (request()->routeIs('dashboard'))
        @include('layouts.navigation')
    @endif

    @isset($header)
        <header>{{ $header }}</header>
    @endisset

    <div>
        @yield('content')
    </div>

    @if (request()->routeIs('home'))
        @include('layouts.footer')
    @endif
</body>

</html>
