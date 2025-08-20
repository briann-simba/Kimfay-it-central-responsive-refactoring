<div>

<div class="flex flex-col md:flex-row gap-4">
    <!-- Card 1 -->
    <div class="max-w-sm md:w-1/3 pb-3">
        <!-- card content here -->
             <a wire:navigate href="{{ route('onboard-new-user') }}"
       class="group block p-6 border rounded-lg shadow transition
              border-gray-200 dark:border-gray-700
              bg-white dark:bg-gray-800
              hover:bg-green-400 hover:border-green-400 hover:text-white
              dark:hover:bg-green-500 dark:hover:border-green-500">
        <div class="flex items-center space-x-4">
            <!-- Icon -->
            <div class="p-3 bg-green-100 dark:bg-gray-700 rounded-full transition group-hover:bg-white group-hover:dark:bg-white/20">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-green-600 dark:text-green-400 group-hover:text-green-600"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 11V5h2v6H9zm0 4v-2h2v2H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <!-- Text -->
            <div>
                <h3 class="text-lg font-semibold dark:text-white">Onboard New User</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Start the onboarding process</p>
            </div>
        </div>
    </a>
    </div>

    <!-- Card 3 -->
    <div class="max-w-sm md:w-1/3 pb-3">
        <!-- card content here -->
         <a wire:navigate href="{{ route('onboarding') }}"
       class="group block p-6 border rounded-lg shadow transition
              border-gray-200 dark:border-gray-700
              bg-white dark:bg-gray-800
              hover:bg-green-400 hover:border-green-400 hover:text-white
              dark:hover:bg-green-500 dark:hover:border-green-500">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-green-100 dark:bg-gray-700 rounded-full transition group-hover:bg-white group-hover:dark:bg-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600 dark:text-green-400 group-hover:text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <!-- Progress icon (chart bar) -->
                    <path d="M3 11h4v6H3v-6zm6-8h4v14h-4V3zm6 4h4v10h-4V7z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold dark:text-white">Back to User Progress</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">View onboarding progress</p>
            </div>
        </div>
    </a>
    </div>
</div>

<!-- Search Bar -->
<div class="flex items-center justify-end mt-4 mb-2">
    <input type="text" placeholder="Search staff..." 
           class="px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-green-500 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600">
    <button class="px-4 py-2 bg-green-500 text-white rounded-r-md hover:bg-green-600">
        Search
    </button>
</div>
    
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Department
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date Onboarded
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Progress
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Sample Row -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                <td class="px-6 py-4 whitespace-nowrap">IT Department</td>
                <td class="px-6 py-4 whitespace-nowrap">2025-08-20</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="w-full bg-gray-200 rounded-full">
                        <div class="bg-green-500 text-xs font-medium text-green-100 text-center p-0.5 leading-none rounded-full" style="width: 70%;">70%</div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        In Progress
                    </span>
                </td>
            </tr>
            <!-- More rows here -->
        </tbody>
    </table>
</div>

</div>
