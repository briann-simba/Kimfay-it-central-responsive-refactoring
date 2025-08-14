<div>
    <!-- Main Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-tight">Role Management</h2>
        
        <!-- Create/Edit Role Section -->
        <div class="mb-1">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">{{ $editingRoleId ? 'Edit Role' : 'Create New Role' }}</h3>
            
            <div class="flex flex-col gap-4">
                <!-- Role Name Input -->
                <div>
                    <label for="roleName" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Role Name</label>
                    <input
                        type="text"
                        id="roleName"
                        wire:model="roleName"
                        placeholder="Enter role name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-9"
                    >
                    @error('roleName') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <!-- Permissions Section -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Permissions</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                        @foreach($permissionGroups as $group)
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    id="perm-group-{{ $group }}"
                                    wire:model="selectedPermissions"
                                    value="{{ $permissions[$group]->first()->id }}"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600"
                                >
                                <label for="perm-group-{{ $group }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $group }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Form Buttons -->
                <div class="flex gap-2 items-center">
                    @if($editingRoleId)
                        <button 
                            wire:click="resetForm"
                            class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 h-9"
                        >
                            Cancel
                        </button>
                    @endif
                    <button 
                        type="button"
                        wire:click="{{ $editingRoleId ? 'updateRole' : 'createRole' }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 h-9"
                    >
                        {{ $editingRoleId ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Search and List Section -->
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Search roles...</h3>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search"
                placeholder="Search roles..."
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6 h-9"
            >
            
            <!-- Roles List -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Permissions Count</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        {{ $role->permissions_count }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button 
                                            wire:click="editRole({{ $role->id }})"
                                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            wire:click="deleteRole({{ $role->id }})"
                                            wire:confirm="Are you sure you want to delete this role?"
                                            class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No roles found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>