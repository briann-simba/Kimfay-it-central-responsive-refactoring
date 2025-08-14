<div>
    
    <nav x-data="{ showLogoutModal: false }" class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-4 py-3 sm:px-6 lg:px-8 flex items-center justify-between">
            
            <!-- Left: Sidebar toggle + Greeting -->
            <div class="flex items-center">
            <!-- Sidebar toggle button (mobile only) -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 dark:hover:bg-gray-700"
            >
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
                </svg>
            </button>
            <span class="text-base sm:text-sm md:text-sm lg:text-lg font-semibold text-gray-800 dark:text-white">
        Hello Dennis Kememwa
        </span>

            </div>

            <!-- Right: Logout button -->
            <div>
            <button
                @click="showLogoutModal = true"
                class="flex items-center px-2 sm:px-4 py-1 sm:py-2 
                    text-xs sm:text-sm font-medium text-white 
                    bg-red-600 rounded-lg hover:bg-red-700 
                    focus:outline-none focus:ring-2 focus:ring-red-500 
                    transition-all"
            >
                <svg class="w-4 h-4 mr-0 sm:mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                <span class="hidden sm:inline">Logout</span>
            </button>
            </div>

        </div>

        <!-- Logout Confirmation Modal -->
        <div 
            x-show="showLogoutModal"
            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
            x-transition
             x-cloak
        >
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 max-w-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Confirm Logout</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to log out? You will need to sign in again to access the application.
            </p>
            
            <div class="mt-4 flex justify-end space-x-3">
                <button 
                @click="showLogoutModal = false" 
                class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300"
                >
                Cancel
                </button>
                <button 
                @click="window.location.href='/logout'" 
                class="px-3 py-1.5 text-sm rounded-lg bg-red-600 hover:bg-red-700 text-white"
                >
                Logout
                </button>
            </div>
            </div>
        </div>
    </nav>

</div>
