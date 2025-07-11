<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Inventory</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <main class="max-w-4xl mx-auto mt-10">
        @yield('content')
    </main>

    @livewireScripts

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Is Livewire loaded?", window.Livewire);
    });
</script>


</body>
</html>
