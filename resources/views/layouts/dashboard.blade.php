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

<body class="bg-color dark:bg-gray-900">

<style>
    [x-cloak] { display: none !important; }
</style>

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


<div x-data="toast" x-cloak x-show="show" x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
     x-transition:leave-end="translate-x-full"
     class="fixed top-4 right-4 z-[1000] max-w-xs w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <template x-if="type === 'success'">
                    <svg class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </template>
                <template x-if="type === 'error'">
                    <svg class="h-6 w-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </template>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
                <p x-text="title" class="text-sm font-medium text-gray-900 dark:text-white"></p>
                <p x-text="message" class="mt-1 text-sm text-gray-500 dark:text-gray-400 whitespace-pre-line"></p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button @click="close()" class="inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Progress bar -->
    <div x-show="showProgress" class="bg-gray-200 dark:bg-gray-700 h-1 w-full">
        <div x-bind:style="`width: ${progress}%`" 
             class="h-1 transition-all duration-300 ease-linear"
             :class="{
                 'bg-green-500': type === 'success',
                 'bg-red-500': type === 'error'
             }"></div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('toast', () => ({
        show: false,
        showProgress: true,
        progress: 100,
        type: 'success',
        title: '',
        message: '',
        timer: null,
        timeout: 3000,
        interval: 50,
        
        init() {
            // Listen for Livewire events
            window.addEventListener('notify', (e) => {
                this.showToast(e.detail.type, e.detail.title, e.detail.message);
            });
        },
        
        showToast(type, title, message) {
            this.type = type;
            this.title = title;
            this.message = message;
            this.show = true;
            this.startTimer();
        },
        
        startTimer() {
            this.progress = 100;
            const step = (this.interval / this.timeout) * 100;
            
            clearInterval(this.timer);
            this.timer = setInterval(() => {
                this.progress -= step;
                
                if (this.progress <= 0) {
                    this.close();
                }
            }, this.interval);
        },
        
        close() {
            clearInterval(this.timer);
            this.show = false;
        },
        
        restartTimer() {
            this.startTimer();
        }
    }));
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if (session()->has('notify'))
            window.dispatchEvent(new CustomEvent('notify', {
                detail: @json(session('notify'))
            }));
        @endif
    });
</script>


</body>
</html>
