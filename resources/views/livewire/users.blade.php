<div class="p-6">

   <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search users..." class="mb-4 p-2 border rounded">

     <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs font-semibold uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">
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
                        <tr class="bg-white dark:bg-gray-900 hover:bg-indigo-50 dark:hover:bg-gray-800 transition-colors">
                            <td class="px-6 py-4 font-medium">{{ $device->name }}</td>
                            <td class="px-6 py-4">{{ $device->color }}</td>
                            <td class="px-6 py-4">{{ $device->category }}</td>
                            <td class="px-6 py-4 text-right">${{ number_format($device->value, 2) }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="#"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-150">
                                    ✏️ Edit
                                </a>
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
    </div>
</div>

</div>
