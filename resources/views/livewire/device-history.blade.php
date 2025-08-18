<div>

        <nav class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li class="inline-flex items-center">
                    <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
                    </svg>
                    <span class="text-gray-900 dark:text-white">Device History Page</span>
                </li>
            </ol>
        </nav>

<div class="w-full p-4 sm:p-6 md:p-8 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 shadow-lg">

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
