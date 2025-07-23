<div>

    <!-- Header -->
    <div class="flex flex-col p-2 sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
            📦 Device Inventory
        </h2>

   @if (session()->has('message'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg dark:bg-green-900 dark:text-green-200 dark:border-green-800"
    >
        {{ session('message') }}
    </div>
@endif



     

        <!-- Search Box -->
        <div class="relative w-full sm:w-72">
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search devices..."
                class="w-full pl-10 pr-4 py-2 text-sm bg-white dark:bg-gray-800 text-gray-700 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" />
            </svg>
        </div>
    </div>

    <!-- Devices Table -->
    <div class="overflow-x-auto mt-4 rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3">Device</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3 text-right">Value</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($devices as $device)
                    <tr class="bg-white dark:bg-gray-900 hover:bg-indigo-50 dark:hover:bg-gray-800 transition-colors duration-150 rounded-md">
                        <td class="px-6 py-4 font-medium">{{ $device->name }}</td>
                        <td class="px-6 py-4">{{ $device->color }}</td>
                        <td class="px-6 py-4">{{ $device->category }}</td>
                        <td class="px-6 py-4 text-right font-semibold text-green-600 dark:text-green-400">${{ number_format($device->value, 2) }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                          <!-- Button that triggers edit -->
                       <button wire:click="loadDevice({{ $device->id }})"
                                class="text-blue-600 hover:underline">
                            Edit
                        </button>
                            <button
                                wire:click="delete({{ $device->id }})"
                                onclick="confirm('Are you sure you want to delete this device?') || event.stopImmediatePropagation()"
                                class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-150">
                                🗑️ Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
                            No devices found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-2 flex justify-end">
        {{ $devices->links() }}
    </div>

    
<!-- Modal with Alpine entangled to Livewire -->
<div x-data="{ show: @entangle('showEditModal') }" x-show="show"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
     x-transition>
    <div @click.away="show = false"
         class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md"
         x-transition.scale>
        <h2 class="text-lg font-semibold mb-4">Edit Device</h2>

        <form wire:submit.prevent="update">

            <div class="mb-4">
                <label>user_id</label>
                <input type="text" wire:model.defer="user_id"
                       class="w-full px-3 py-2 border rounded" />
                @error('user_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label>Name</label>
                <input type="text" wire:model.defer="name"
                       class="w-full px-3 py-2 border rounded" />
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label>color</label>
                <input type="text" wire:model.defer="color"
                       class="w-full px-3 py-2 border rounded" />
                @error('color') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label>category</label>
                <input type="text" wire:model.defer="category"
                       class="w-full px-3 py-2 border rounded" />
                @error('category') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label>value</label>
                <input type="text" wire:model.defer="value"
                       class="w-full px-3 py-2 border rounded" />
                @error('value') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end">
                <button type="button" @click="show = false" class="mr-2 px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>
    

</div>
