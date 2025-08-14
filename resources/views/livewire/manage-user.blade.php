<div x-data="{
    showAddUserModal: false,
    showEditUserModal: false,
}" 
@close-add-user-modal.window="showAddUserModal = false"
 @open-edit-user-modal.window="showEditUserModal = true"
  @close-edit-user-modal.window="showEditUserModal = false">
    <!-- ▸ User-Management Breadcrumb + Toolbar -->
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white tracking-tight">User Management</h2>
        
        <!-- Add User Button -->
        <button
            @click="showAddUserModal = true"
            class="flex items-center px-2 sm:px-4 py-1 sm:py-2 
                text-xs sm:text-sm font-medium text-white 
                bg-blue-600 rounded-lg hover:bg-blue-700 
                focus:outline-none focus:ring-2 focus:ring-blue-500 
                transition-all">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span class="hidden sm:inline">Add User</span>
        </button>
    </div>

    <!-- Main content container -->
    <div class="w-full p-6 sm:p-8 bg-gradient-to-br from-indigo-50 via-white to-purple-50 rounded-2xl shadow-lg dark:bg-gray-800 transition-all duration-500 overflow-hidden">
        @livewire('users',['users' => $users])
    </div>

    <!-- Add User Modal -->
    <div 
        x-show="showAddUserModal"
        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
        x-transition
    >
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg w-11/12 max-w-2xl max-h-[calc(100vh-2rem)] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add New User
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        @click="showAddUserModal = false">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round"
                         stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Body -->
            <form wire:submit.prevent="addUser" class="p-6 space-y-6">
                <!-- Full width fields -->
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="add-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input wire:model="name" id="add-name" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="John Doe">
                        @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="add-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input wire:model="email" id="add-email" type="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="john.doe@company.com">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Half width fields in a grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="add-department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select wire:model="department_id" id="add-department"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="add-division" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division</label>
                        <select wire:model="division_id" id="add-division"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="add-designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation</label>
                        <select wire:model="designation_id" id="add-designation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Designation</option>
                            @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                            @endforeach
                        </select>
                        @error('designation_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Roles Section -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($roles as $role)
                        <div class="flex items-center">
                            <input wire:model="selectedRoles" 
                                   id="role-{{ $role }}" 
                                   type="checkbox" 
                                   value="{{ $role }}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="role-{{ $role }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $role }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('selectedRoles')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end space-x-3">
                    <button type="button" 
                            @click="showAddUserModal = false"
                            class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        Cancel
                    </button>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal - Simplified version using wire:model -->
    <div x-show="showEditUserModal"
         class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
         x-transition>
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg w-11/12 max-w-2xl max-h-[calc(100vh-2rem)] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        @click="showEditUserModal = false">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round"
                         stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Body - Using wire:model like the add user form -->
            <form wire:submit.prevent="updateUser" class="p-6 space-y-6">
                <!-- Full width fields -->
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input wire:model="name" id="edit-name" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="edit-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input wire:model="email" id="edit-email" type="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Half width fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="edit-department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select wire:model="department_id" id="edit-department"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="edit-division" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division</label>
                        <select wire:model="division_id" id="edit-division"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="edit-designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation</label>
                        <select wire:model="designation_id" id="edit-designation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Designation</option>
                            @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                            @endforeach
                        </select>
                        @error('designation_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Roles Section -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($roles as $role)
                        <div class="flex items-center">
                            <input wire:model="editSelectedRoles" 
                                   id="edit-role-{{ $role }}" 
                                   type="checkbox" 
                                   value="{{ $role }}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="edit-role-{{ $role }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $role }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('editSelectedRoles')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3">
                    <button type="button" 
                            @click="showEditUserModal = false"
                            class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        Cancel
                    </button>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>