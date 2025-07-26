<div>
<x-slot name="navguide">
    <nav class="flex items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2">
            <li class="inline-flex items-center">
                <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
                </svg>
                <span class="text-gray-900 dark:text-white">Dashboard Page</span>
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
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-indigo-600 dark:text-indigo-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25v10.5A2.25 2.25 0 0118.75 18H5.25A2.25 2.25 0 013 15.75V5.25z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 18.75h18" />
                </svg>
                <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white tracking-tight">My&nbsp;Devices</h2>
            </div>
            <!-- CTA: report issue -->
            <a href="mailto:it@company.com" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-800 transition-colors duration-300">
                <!-- Heroicons Mini: Exclamation Triangle -->
                <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                        <th scope="col" class="px-6 py-3 text-right">Status</th>
                        <th scope="col" class="px-6 py-3 text-right">Comment</th>
                        <th scope="col" class="px-6 py-3 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">




                    <!-- Example row -->
                     <!-- logic for item issue  -->

@forelse(auth()->user()->devices as $device)
    <tr class="bg-white hover:bg-indigo-50 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors">
        <td class="px-6 py-4">{{ $device->name }}</td>
        <td class="px-6 py-4">{{ $device->color }}</td>
        <td class="px-6 py-4">{{ $device->category }}</td>
        <td class="px-6 py-4 text-right">${{ number_format($device->value, 2) }}</td>

        {{-- Active / Inactive Badge --}}
        <td class="px-6 py-4 text-right">
            @if(!$device->Line_Manager_Approval || !$device->User_Accepted)
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                    Inactive
                </span>
            @else
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                    Active
                </span>
            @endif
        </td>

        {{-- Status Message --}}
       <td class="px-6 py-4 text-right">
    @if (!$device->Line_Manager_Approval)
        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
            {{ __('Waiting for line manager approval') }}
        </span>
    @elseif (!$device->User_Accepted)
        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-orange-800 bg-orange-100 rounded-full">
            {{ __('Waiting for user acceptance') }}
        </span>
    @else
        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
            {{ __('In use') }}
        </span>
    @endif
</td>

<td class="px-6 py-4 text-right">
    <div x-data="{ open: false }">
        <button
            @click="open = true"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed"
            :disabled="{{ $device->Line_Manager_Approval && $device->User_Accepted ? 'true' : 'false' }}"
        >
            Accept Device
        </button>

        <!-- Transparent Modal Overlay -->
        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/30  dark:bg-gray-900/30"
        >
            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Action</h2>
                <p class="mb-6 text-sm text-gray-600 dark:text-gray-300">
                    Are you sure you want to accept this device?
                </p>

                <div class="flex justify-end space-x-2">
                    <button
                        @click="open = false"
                        class="px-4 py-2 text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 rounded"
                    >
                        Cancel
                    </button>
                    <button
                        @click="open = false; $nextTick(() => { @this.acceptDevice({{ $device->id }}) })"

                        class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded"
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
        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
            You have no devices assigned.
        </td>
    </tr>
@endforelse

                    
                    
                    <!-- Repeat rows dynamically here -->
                </tbody>
            </table>
        </div>
    </div>
</x-slot>

</div>