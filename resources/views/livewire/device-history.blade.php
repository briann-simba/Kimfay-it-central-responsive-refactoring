<div>

<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Device Logs</h2>
        <input 
            type="text" 
            wire:model.debounce.300ms="search" 
            placeholder="Search by device/user/action..." 
            class="px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white"
        />
    </div>

    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Device</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Action</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">User</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Performed By</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Reason</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Comment</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">30 Jul 2025</td>
                    <td class="px-4 py-3 text-sm">Dell Latitude 5520</td>
                    <td class="px-4 py-3 text-sm font-medium text-green-600">Assigned</td>
                    <td class="px-4 py-3 text-sm">James Otieno</td>
                    <td class="px-4 py-3 text-sm">Admin</td>
                    <td class="px-4 py-3 text-sm">Project Deployment</td>
                    <td class="px-4 py-3 text-sm">Assigned for marketing campaign support.</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">20 Jul 2025</td>
                    <td class="px-4 py-3 text-sm">MacBook Air M2</td>
                    <td class="px-4 py-3 text-sm font-medium text-red-600">Unassigned</td>
                    <td class="px-4 py-3 text-sm">Susan Nyambura</td>
                    <td class="px-4 py-3 text-sm">IT Support</td>
                    <td class="px-4 py-3 text-sm">Resignation</td>
                    <td class="px-4 py-3 text-sm">Device collected after offboarding.</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">15 Jul 2025</td>
                    <td class="px-4 py-3 text-sm">HP ProBook 440</td>
                    <td class="px-4 py-3 text-sm font-medium text-green-600">Assigned</td>
                    <td class="px-4 py-3 text-sm">Kevin Maina</td>
                    <td class="px-4 py-3 text-sm">Line Manager</td>
                    <td class="px-4 py-3 text-sm">New Staff</td>
                    <td class="px-4 py-3 text-sm">Assigned as part of onboarding process.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{-- Placeholder for pagination (e.g., $logs->links()) --}}
        <nav class="flex justify-end">
            <ul class="inline-flex -space-x-px">
                <li><a href="#" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-sm text-gray-700 dark:text-white rounded-l">Prev</a></li>
                <li><a href="#" class="px-3 py-1 bg-gray-100 dark:bg-gray-600 text-sm text-gray-800 dark:text-white">1</a></li>
                <li><a href="#" class="px-3 py-1 bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white">2</a></li>
                <li><a href="#" class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-sm text-gray-700 dark:text-white rounded-r">Next</a></li>
            </ul>
        </nav>
    </div>
</div>


</div>
