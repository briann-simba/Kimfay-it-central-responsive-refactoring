<div>
<x-slot name="navguide">
    <nav class="flex items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <!-- Home icon -->
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M10.707 1.707a1 1 0 00-1.414 0L2 9h2v8a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1V9h2L10.707 1.707z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z"/>
                    </svg>
                    <span class="text-gray-900 dark:text-white">Dashboard Page</span>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>

<x-slot name="header1">
    <!-- Container -->
    <div class="w-full p-6 sm:p-8 bg-gradient-to-br from-indigo-50 via-white to-purple-50 rounded-2xl shadow-lg dark:bg-gray-800 transition-all duration-500">
        <!-- Title row -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <!-- Laptop/Device icon (Heroicons Outline) -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-indigo-600 dark:text-indigo-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25v10.5A2.25 2.25 0 0118.75 18H5.25A2.25 2.25 0 013 15.75V5.25z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 18.75h18" />
                </svg>
                <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white tracking-tight">My&nbsp;Devices</h2>
            </div>
            <!-- CTA: report issue -->
            <a href="mailto:it@company.com" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-800 transition-colors duration-300">
                <!-- Heroicons Mini: Exclamation Triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.008v.008H12V17z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.29 3.86l-7.482 13.5A1.5 1.5 0 004.018 19.5h15.964a1.5 1.5 0 001.31-2.14l-7.482-13.5a1.5 1.5 0 00-2.62 0z" />
                </svg>
                Report discrepancy
            </a>
        </div>

        <!-- Description -->
        <p class="mb-6 text-gray-600 dark:text-gray-400 max-w-3xl leading-relaxed">
            Below is the list of company‑issued devices assigned to you. If you notice any discrepancy, please let the IT team know.
        </p>

        <!-- Responsive table -->
        <div class="overflow-x-auto rounded-lg ring-1 ring-gray-200 dark:ring-gray-700">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Device</th>
                        <th scope="col" class="px-6 py-3">Color</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3 text-right">Value</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    <!-- Example row -->
                    <tr class="bg-white hover:bg-indigo-50 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                            Apple&nbsp;MacBook&nbsp;Pro&nbsp;17″
                        </th>
                        <td class="px-6 py-4">Silver</td>
                        <td class="px-6 py-4">Laptop</td>
                        <td class="px-6 py-4 text-right">$2,999</td>
                    </tr>
                    <!-- Repeat rows dynamically here -->
                </tbody>
            </table>
        </div>
    </div>
</x-slot>

</div>