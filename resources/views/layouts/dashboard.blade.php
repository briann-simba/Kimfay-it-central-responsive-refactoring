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

<body class="bg-gray-50 dark:bg-gray-900">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <div>
        <!-- Sidebar content here (unchanged) -->
        @livewire('sidebar')
    </div>
      
    

    <!-- Main Content Area -->
    <div class="ml-[280px] flex-1 p-4">

        <!-- Breadcrumb & Greeting Bar -->
        <div class = "sticky top-0 z-40">
          @livewire('navigationbar')
        </div><br><hr><br>

        <!-- Slot: Navigation Guide -->
        @isset($navguide)
            <div class="mb-6">
                {{ $navguide }}
            </div>
        @endisset

        <!-- Slot: Tabs / Header Content -->
        @isset($header1)
            <div class="mb-6">
                {{ $header1 }}
            </div>
        @endisset

        <!-- Slot: Main Blade Content (e.g. Inventory table) -->
        <div class="mb-6">
            {{ $slot }}
        </div>

    </div>
</div>

@livewire('logout')
@livewireScripts
@livewire('wire-elements-modal')
<livewire:modals.edit-device />


</body>
</html>
