<div>


<div class="p-6 dark:bg-gray-900 min-h-screen">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Device Logs</h2>

        <div class="flex flex-col md:flex-row gap-2 md:items-center">
            <input 
                type="text" 
                placeholder="Search device, user, action..."
                class="px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600"
            />

            <button 
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
                @foreach (range(1, 10) as $i)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">2025-07-{{ 30 - $i }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">HP ProBook {{ 450 + $i }}</td>
                    <td class="px-4 py-3 text-sm font-medium {{ $i % 2 == 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $i % 2 == 0 ? 'Assigned' : 'Unassigned' }}
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">User {{ $i }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">Admin {{ $i }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">{{ $i % 2 == 0 ? 'Onboarding' : 'Exit' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                        {{ $i % 2 == 0 ? 'New employee allocation' : 'Device returned to inventory' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-end">
        <ul class="inline-flex -space-x-px text-sm">
            <li><a href="#" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-l hover:bg-gray-300">Prev</a></li>
            <li><a href="#" class="px-3 py-1 bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-white">1</a></li>
            <li><a href="#" class="px-3 py-1 bg-white dark:bg-gray-800 text-gray-800 dark:text-white">2</a></li>
            <li><a href="#" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-r hover:bg-gray-300">Next</a></li>
        </ul>
    </div>
</div>


</div>
