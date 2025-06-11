<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Styles / Scripts -->
       
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-400 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    
    <div class="flex justify-end p-4 bg-gray-100">
    @livewire('logout')
    </div>
    
    {{ $slot }}
    </body>
</html>
