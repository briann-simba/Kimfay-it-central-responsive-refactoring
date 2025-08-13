<div>

<div class="p-6 dark:bg-gray-900 min-h-screen">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
     <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white tracking-tight">Device Logs</h2>

        <div class="flex flex-col md:flex-row gap-2 md:items-center">
            <input 
                type="text" 
                placeholder="Search..."
                wire:model.live.debounce.500ms="search"
                class="px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600"
            />

            <button 
                wire:click="export"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition"
            >
                Export Report
            </button>
        </div>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Device</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Action</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">User</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Performed By</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Reason</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Comment</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($logs as $log)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">
                            {{ \Carbon\Carbon::parse($log->action_date)->format('Y-m-d') }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $log->device->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium {{ $log->action_type === 'assign' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($log->action_type) }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $log->user->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $log->actionByUser->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $log->reason }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $log->comment }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
                                No Logs Found
                            </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-end">
        {{ $logs->links() }}
    </div>
</div>


</div>
