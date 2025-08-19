<div class="space-y-6">

        <nav class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li class="inline-flex items-center">
                    <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
                    </svg>
                    <span class="text-gray-900 dark:text-white">Pending Approval Page</span>
                </li>
            </ol>
        </nav>

 
<div class="w-full p-4 sm:p-6 md:p-8 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 shadow-lg">
    <h2 class="text-2xl pb-3 font-extrabold text-gray-800 dark:text-white tracking-tight">Pending Devices Awaiting Approval</h2>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Product Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Color</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Price</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Action</th>
                </tr>
            </thead>
        <tbody>

        @forelse($pendingDevices as $device)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $device->name }}
                </th>
                <td class="px-4 py-3">
                    {{ $device->color }}
                </td>
                <td class="px-4 py-3">
                    {{ $device->category }}
                </td>
                <td class="px-4 py-3">
                    {{ $device->value }}
                </td>
               <td class="px-4 py-3 text-center">
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
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 max-w-md p-6">
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
                    <td colspan="5" class="px-4 py-3 text-center">
                        No pending devices for approval.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
<div class="flex justify-center py-3">
    {{ $pendingDevices->links() }}
</div>

</div>
 

</div>
