<div>
    
    <aside
        x-show="sidebarOpen"
        x-cloak
        class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 flex flex-col"
        @click.away.window="if (window.innerWidth < 640) sidebarOpen = false">
            <!-- Logo -->
        <div class="flex items-center justify-center h-16">
            <img src="/images/kimfay.png" alt="Logo" class="h-12 w-auto object-contain">
        </div>

        <div class="flex-1 pb-4 px-3 overflow-y-auto">

        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
            <a wire:navigate href="{{route('home')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 11V5h2v6H9zm0 4v-2h2v2H9z" />
                </svg>
                <span class="ml-3 sm:text-sm md:text-sm lg:text-base">Dashboard</span>
            </a>
            </li>

            <!-- Inventory with nested submenu -->
            <li x-data="{
                        open: JSON.parse(localStorage.getItem('menu-inventory')) ?? false
                    }"
                    x-init="$watch('open', value => localStorage.setItem('menu-inventory', value))">
            <button
                @click="open = !open"
                class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                :aria-expanded="open"
            >
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Inventory</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <ul x-show="open" class="py-2 space-y-2">
                <li>
                    <a wire:navigate href="{{route('inventory')}}" 
                    class="flex items-center p-2 pl-11 sm:text-xs md:text-base lg:text-sm  text-gray-900 rounded-lg hover:bg-green-200 dark:text-white dark:hover:bg-gray-700 whitespace-nowrap">
                        <span class="w-4 h-4 mr-2 flex items-center justify-center">🗂️</span>
                        Overview
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{route('pendingapproval')}}" 
                    class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-yellow-200 dark:text-white dark:hover:bg-gray-700">
                        <span class="w-4 h-4 mr-2 flex items-center justify-center">⏳</span>
                        Pending Approval
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{route('devicehistory')}}" 
                    class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-blue-200 dark:text-white dark:hover:bg-gray-700 whitespace-nowrap">
                        <span class="w-4 h-4 mr-2 flex items-center justify-center">📜</span>
                        Device History
                    </a>
                </li>
            </ul>

            </li>

            <li x-data="{
                        open: JSON.parse(localStorage.getItem('menu-users')) ?? false
                    }"
                    x-init="$watch('open', value => localStorage.setItem('menu-users', value))">
                <!-- Parent menu button -->
                <button 
                    @click="open = !open"
                    class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg group hover:bg-green-200 dark:text-white dark:hover:bg-gray-700"
                >
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a5 5 0 1 0 0 10A5 5 0 0 0 10 2Zm0 12c-5.33 0-8 2.667-8 4v2h16v-2c0-1.333-2.67-4-8-4Z"/>
                    </svg>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">User Management</span>
                    <svg :class="{ 'rotate-180': open }" class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <ul x-show="open" class="py-2 space-y-2">
                    <li>
                        <a href="#" 
                        class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-green-200 dark:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                        class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-green-200 dark:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>
                            Roles
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                        class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-green-200 dark:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>
                            Permissions
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                        class="flex items-center sm:text-xs md:text-base lg:text-sm p-2 pl-11 text-gray-900 rounded-lg hover:bg-green-200 dark:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>
                            Offboard User
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Settings -->
            <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.75 3a.75.75 0 01.75.75v1.042a7.53 7.53 0 012.5 0V3.75a.75.75 0 111.5 0v1.042a7.501 7.501 0 013.318 2.163l.735-.734a.75.75 0 111.06 1.061l-.734.735a7.501 7.501 0 012.163 3.318h1.042a.75.75 0 110 1.5h-1.042a7.501 7.501 0 01-2.163 3.318l.734.735a.75.75 0 11-1.061 1.06l-.735-.734a7.501 7.501 0 01-3.318 2.163v1.042a.75.75 0 11-1.5 0v-1.042a7.53 7.53 0 01-2.5 0v1.042a.75.75 0 11-1.5 0v-1.042a7.501 7.501 0 01-3.318-2.163l-.735.734a.75.75 0 11-1.06-1.061l.734-.735a7.501 7.501 0 01-2.163-3.318H3.75a.75.75 0 110-1.5h1.042a7.501 7.501 0 012.163-3.318l-.734-.735a.75.75 0 111.061-1.06l.735.734A7.501 7.501 0 019.75 4.792V3.75A.75.75 0 019.75 3z" />
                </svg>
                <span class="ml-3">Settings</span>
            </a>
            </li>
            <li>
            <a href="#"
                class="flex items-center gap-3 p-2 text-gray-700 rounded-lg hover:bg-green-100 dark:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                </svg>
                <span>Change Password?</span>
            </a>
            </li>

        </ul>
        </div>
    </aside>

</div>
