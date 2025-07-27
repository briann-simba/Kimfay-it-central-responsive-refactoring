<div class="space-y-6">

    <!-- Section Header -->
    <div class="flex items-center justify-between px-4 py-3 bg-yellow-100 dark:bg-yellow-900 border border-yellow-300 dark:border-yellow-700 rounded-lg shadow-sm">
        <h2 class="text-lg md:text-xl font-bold text-yellow-900 dark:text-yellow-100 flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-3a1 1 0 00-1 1v2a1 1 0 002 0V8a1 1 0 00-1-1zm0 6a1 1 0 100-2 1 1 0 000 2z"/>
            </svg>
            Pending Devices for Approval
        </h2>
        <span class="text-sm text-yellow-700 dark:text-yellow-300 font-medium">Action Required</span>
    </div>

    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

        @forelse($pendingDevices as $device)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $device->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $device->color }}
                </td>
                <td class="px-6 py-4">
                    {{ $device->category }}
                </td>
                <td class="px-6 py-4">
                    {{ $device->value }}
                </td>
               <td class="px-6 py-4 text-center">
                    <div x-data="{ open: false }">
                        <!-- Approve Button -->
                        <button
                            @click="open = true"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white bg-green-600 rounded hover:bg-green-700 focus:ring-2 focus:ring-green-400 dark:bg-green-500 dark:hover:bg-green-600"
                        >
                            ✅ Approve
                        </button>

                        <!-- Confirmation Modal -->
                        <div
                            x-show="open"
                            x-cloak
                            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/30 dark:bg-gray-900/30"
                        >
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Approval</h2>
                                <p class="mb-6 text-sm text-gray-600 dark:text-gray-300">
                                    Are you sure you want to approve this device?
                                </p>

                                <div class="flex justify-end gap-2">
                                    <button
                                        @click="open = false"
                                        class="px-4 py-2 text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 rounded"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        @click="open = false; $nextTick(() => { @this.approveDevice({{ $device->id }}) })"
                                        class="px-4 py-2 text-sm bg-green-600 hover:bg-green-700 text-white rounded"
                                    >
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">
                        No pending devices for approval.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


   </div>
