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

  <!-- Sidebar to edit sidebar go to sidebar livewire component-->
  <div>
      @livewire('sidebar')
  </div>

  <!-- Toast Notification -->
  <div>
    @livewire('notification-toast')
  </div>

  

  <!-- Main content -->
    <div class="p-4 pt-20" :class="{ 'sm:ml-64': sidebarOpen }">
        <!-- <div class="p-4 rounded-lg border-2 border-dashed border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Welcome</h1>
        <p class="text-gray-600 dark:text-gray-300">Sidebar adapts automatically and supports nested menu items.</p>
        </div> -->
        
        {{$slot}}
    </div>

  <!-- Alpine.js for sidebar state management -->
<script>
  function sidebarState() {
      return {
          sidebarOpen: true,
          initSidebar() {
              const saved = localStorage.getItem('sidebar');

              if (window.innerWidth < 640) {
                  // On small screen use saved state, default closed if none
                  this.sidebarOpen = saved ? JSON.parse(saved) : false;
              } else {
                  // On wide screen default open unless user saved preference
                  this.sidebarOpen = saved ? JSON.parse(saved) : true;
              }

              this.$watch('sidebarOpen', val => localStorage.setItem('sidebar', val));

              // Optional: responsive correction on resize
              window.addEventListener('resize', () => {
                  if (window.innerWidth < 640) {
                      // If screen suddenly shrinks, keep user preference but often closed
                      this.sidebarOpen = saved ? JSON.parse(saved) : false;
                  }
              });
          }
      }
  }
</script>

@livewireScripts
</body>
</html>
