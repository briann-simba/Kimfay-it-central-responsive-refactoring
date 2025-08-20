<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('images/kimfay.png') }}" type="image/png">


        <title>{{config('app.name')}}</title>

        <!-- Styles / Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-400">
    

    
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        {{$slot}}
    </div>

     @livewireScripts
    </body>
</html>
