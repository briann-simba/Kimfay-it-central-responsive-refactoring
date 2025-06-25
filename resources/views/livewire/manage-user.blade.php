<div>
    <!-- ▸ User-Management Breadcrumb + Toolbar -->
<x-slot name="navguide">
    <div class="flex items-center justify-between mb-6">
        <nav class="text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li class="inline-flex items-center">
                    <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3.5a.75.75 0 01.75.75V10h5.75a.75.75 0 010 1.5H10.75v5.75a.75.75 0 01-1.5 0V11.5H3.5a.75.75 0 010-1.5h5.75V4.25A.75.75 0 0110 3.5z" />
                    </svg>
                    <span class="text-gray-900 dark:text-white">User Management</span>
                </li>
            </ol>
        </nav>
    </div>
</x-slot>

<x-slot name="header1">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Add User Card -->
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-3 mb-3">
            <div class="text-blue-600 bg-blue-100 p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Add User</h5>
        </div>
        <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Register a new user and assign them appropriate roles.</p>
        <button type="button" data-modal-target="add-user-modal" data-modal-toggle="add-user-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add User
        </button>
    </div>

    <!-- Manage Roles Card -->
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-3 mb-3">
            <div class="text-yellow-600 bg-yellow-100 p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Manage Roles</h5>
        </div>
        <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Edit user roles and access levels in the system.</p>
       <button type="button"
    data-modal-target="manage-roles-modal"
    data-modal-toggle="manage-roles-modal"
    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">
    Manage Roles
</button>

    </div>

    <!-- Disable User Card -->
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-3 mb-3">
            <div class="text-red-600 bg-red-100 p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Disable User</h5>
        </div>
        <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Temporarily revoke access to user accounts.</p>
        <button type="button"
            data-modal-target="disable-user-modal"
            data-modal-toggle="disable-user-modal"
            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
            Disable User
        </button>
    </div>

    <!-- modals for Add User, Manage Roles, and Disable User will be implemented here -->
     {{-- 🔸 1. ADD USER MODAL --}}
<div id="add-user-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex items-center justify-center w-full p-4 md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add New User
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        data-modal-hide="add-user-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round"
                         stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Body -->
            <form class="p-4 space-y-4">
                <div>
                    <label for="add-name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                    <input id="add-name" type="text" required
                           class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                                  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>
                <div>
                    <label for="add-email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                    <input id="add-email" type="email" required
                           class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                                  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>
                <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg
                               hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                               dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save User
                </button>
            </form>
        </div>
    </div>
</div>

{{-- 🔸 2. MANAGE ROLES MODAL --}}
<div id="manage-roles-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex items-center justify-center w-full p-4 md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Manage User Roles
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        data-modal-hide="manage-roles-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round"
                         stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <form class="p-4 space-y-4">
                <div>
                    <label for="select-user" class="block text-sm font-medium text-gray-700 dark:text-white">User</label>
                    <select id="select-user"
                            class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                                   focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                        <option value="">Select user</option>
                        
                    </select>
                </div>
                <div>
                    <label for="select-role" class="block text-sm font-medium text-gray-700 dark:text-white">Role</label>
                    <select id="select-role"
                            class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                                   focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                        <option value="">Select role</option>
                       
                    </select>
                </div>
                <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg
                               hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300
                               dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
</div>

{{-- 🔸 3. DISABLE USER MODAL --}}
<div id="disable-user-modal" tabindex="-1" aria-hidden="true"
     class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex items-center justify-center w-full p-4 md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Disable User
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        data-modal-hide="disable-user-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round"
                         stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <form class="p-4 space-y-4">
                <div>
                    <label for="disable-select-user" class="block text-sm font-medium text-gray-700 dark:text-white">User</label>
                    <select id="disable-select-user"
                            class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                                   focus:ring-red-500 focus:border-red-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                        <option value="">Select user</option>
                    </select>
                </div>
                <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg
                               hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300
                               dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                    Disable User
                </button>
            </form>
        </div>
    </div>
</div>

</div>
</x-slot>

</div>
