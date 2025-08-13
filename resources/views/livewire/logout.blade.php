<div x-data @open-logout-modal.window="$wire.call('open')">
    @if ($show)
        <!-- Flowbite-compatible modal -->
<div class="fixed inset-0 z-50 bg-gray-800/55 flex items-center justify-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md p-6">

                <!-- Close button -->
                <button wire:click="close"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1l12 12M13 1L1 13"/>
                    </svg>
                </button>

                <!-- Modal content -->
                <div class="text-center mt-4">
                    <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 18.5a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13z"/>
                    </svg>

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are you sure you want to logout?
                    </h3>

                    <button wire:click="logout"
                            class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                        Yes, Logout
                    </button>
                    <button wire:click="close"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
