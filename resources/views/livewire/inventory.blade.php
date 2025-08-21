<div>

    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2">
            <li class="inline-flex items-center">
                <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
                </svg>
                <span class="text-gray-900 dark:text-white">Kim-Fay Inventory &amp; Assets</span>
            </li>
        </ol>
    </nav>
  
     <!-- Header with breadcrumb and button -->
    <div class="flex items-center justify-between mb-6 pt-4">
        <!-- Alpine component wrapper -->
        <div x-cloak x-data="{ isOpen: false }"
            @close-modal.window="isOpen = false"
            x-init="$watch('isOpen', val => document.body.classList.toggle('overflow-hidden', val))">

            <!-- Add Inventory Button -->
            <div @click="isOpen = true"
                class="cursor-pointer rounded-2xl border border-gray-200 bg-white dark:bg-gray-900 p-6 shadow-sm 
                    transition transform hover:scale-[1.02] hover:shadow-lg hover:border-blue-400 
                    dark:border-gray-700 dark:hover:border-blue-500 group">

                <div class="flex items-center gap-4">
                    <!-- Icon Circle -->
                    <div class="flex h-12 w-12 items-center justify-center rounded-full 
                                bg-blue-100 text-blue-700 dark:bg-blue-500/20 dark:text-blue-400 
                                transition group-hover:bg-blue-200 dark:group-hover:bg-blue-500/30">
                        <svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <!-- Text -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Add New Device
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Create a new inventory record
                        </p>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div x-show="isOpen" x-cloak x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div @click.away="isOpen = false" class="relative w-full max-w-md max-h-[90vh] overflow-y-auto p-4">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Device
                            </h3>
                            <button @click="isOpen = false"
                                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>

                        <!-- Modal body - Livewire Form -->
                        <form wire:submit.prevent="create" class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <!-- Name -->
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device Name</label>
                                    <input type="text" wire:model.defer="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., HP Laptop">
                                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Value -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                                    <input type="number" wire:model="value" id="value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., 1500">
                                    @error('value') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select wire:model="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        <option value="">Select category</option>
                                        <option value="TV">TV/Monitor</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                    @error('category') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Color -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                                    <input type="text" wire:model.live="color" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., Silver">
                                    @error('color') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- User ID -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Assigned User ID
                                    </label>
                                    <select wire:model="user_id" id="user_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        <option value="">-- None --</option>
                                        <option value="1">User One</option>
                                        <option value="2">User Two</option>
                                        <option value="3">User Three</option>
                                    </select>
                                    @error('user_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Add Device
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="overflow-x-auto rounded-lg ring-gray-200 dark:ring-gray-700 mt-4">
             @livewire('devices')
    </div>

   </div> 
