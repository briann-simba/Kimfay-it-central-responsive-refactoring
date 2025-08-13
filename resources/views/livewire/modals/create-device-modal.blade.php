<div>

<div wire:ignore.self
     class="fixed inset-0 z-[99999] flex items-center justify-center overflow-y-auto p-4 bg-white/30 backdrop-blur-md">

    <div class="relative w-full max-w-2xl max-h-screen overflow-y-auto bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Loading Overlay -->
        <div wire:loading
             class="absolute inset-0 z-50 bg-white bg-opacity-70 dark:bg-gray-800 flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-600 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 11-8 8z"></path>
            </svg>
        </div>

        <!-- Modal content -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Create New Product
            </h3>
            <button type="button"
                    wire:click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

        </div>

        <form wire:submit.prevent="create" class="p-4 md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">

                <!-- Name -->
                <div class="col-span-2">
                    <label for="name"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device Name</label>
                    <input type="text" wire:model.defer="name" id="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                           placeholder="e.g., HP Laptop">
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Value -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="value"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                    <input type="number" wire:model="value" id="value"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                           placeholder="e.g., 1500">
                    @error('value') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Category -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="category"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select wire:model="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
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
                    <label for="color"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                    <input type="text" wire:model="color" id="color"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                           placeholder="e.g., Silver">
                    @error('color') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- User ID -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="user_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigned User ID</label>
                    <input type="number" wire:model="user_id" id="user_id"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                           placeholder="e.g., 12">
                    @error('user_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

            </div>

            <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"></path>
                </svg>
                Add Device
            </button>
        </form>
    </div>
</div>

</div>
