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
  x-data="sidebarState()"
  x-init="initSidebar()"
  class="bg-gray-50 dark:bg-gray-900"
>

  <!-- Navbar to edit navbar go to navbar livewire component-->
    <div>
      @livewire('navigation-bar')
    </div>


  <!-- Toast Notification -->
  <div>
    @livewire('notification-toast')
  </div>

  

  <!-- Main content -->
    <div class="p-4 pt-20 flex flex-col items-center justify-center">
        <!-- <div class="p-4 rounded-lg border-2 border-dashed border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Welcome</h1>
        <p class="text-gray-600 dark:text-gray-300">Sidebar adapts automatically and supports nested menu items.</p>
        </div> -->
        
        {{$slot}}
    </div>
 

@livewireScripts

</body>
</html>
