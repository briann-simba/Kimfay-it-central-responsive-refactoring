<div>
    <!-- Logout Trigger -->
    <a href="#"
       data-modal-target="logoutConfirmModal"
       data-modal-toggle="logoutConfirmModal"
       class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        Logout
    </a>

    <!-- Modal -->
    <div id="logoutConfirmModal"
         tabindex="-1"
         class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black/30 backdrop-blur-sm flex justify-center items-center">

        <div class="relative w-full max-w-md p-4">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700 relative">

                <!-- Close Button -->
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-900"
                        data-modal-hide="logoutConfirmModal">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1l12 12M13 1L1 13" />
                    </svg>
                </button>

                <!-- Content -->
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 18.5a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are you sure you want to logout?
                    </h3>
                    <button wire:click="logout"
                            data-modal-hide="logoutConfirmModal"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                        Yes, Logout
                    </button>
                    <button data-modal-hide="logoutConfirmModal"
                            class="text-gray-500 bg-white hover:bg-gray-100 border border-gray-300 rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
