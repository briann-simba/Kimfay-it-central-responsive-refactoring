<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Styles / Scripts -->
       @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body  >
        
        {{ $slot }}

    @livewireScripts

    @script
<script>

    $wire.on('close-crud-modal', () => {
        //
        const modalEl = document.getElementById('crud-modal');
        if (modalEl) {
            modalEl.classList.remove('show');
            modalEl.setAttribute('aria-hidden', 'true');
            modalEl.style.display = 'none';
        }
    });
</script>
@endscript
    </body>
</html>
