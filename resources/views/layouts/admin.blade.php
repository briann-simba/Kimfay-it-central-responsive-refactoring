<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('images/kimfay.png') }}" type="image/png">

    <!-- Livewire styles -->
    @livewireStyles

    <!-- Vite assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white">

    <!-- Page content -->
    {{ $slot }}

    <!-- Livewire logout component (use this syntax in v3) -->
    <livewire:logout />

    <!-- Livewire scripts (deferred for v3) -->
    @livewireScripts(true)
</body>
</html>
