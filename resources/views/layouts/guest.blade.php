<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('images/kimfay.png') }}" type="image/png">

        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
<!-- we want to control the behavior of the sidebar via the localstorage-->
<body
  class="bg-gray-50 dark:bg-gray-900">

  <!-- Navbar to edit navbar go to navbar livewire component-->
    <div>
      @livewire('navigation-bar')
    </div>


  <!-- Toast Notification -->
  <div>
    @livewire('notification-toast')
  </div>

  

  <!-- Main content -->
 <div class="min-h-screen flex flex-col items-center justify-center p-4">
    {{$slot}}
</div>

 

@livewireScripts

</body>
</html>
