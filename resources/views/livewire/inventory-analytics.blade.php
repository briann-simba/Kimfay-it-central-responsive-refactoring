<div>
    
<div class="overflow-x-auto mt-4 rounded-lg border border-gray-200 dark:border-gray-700 overflow-visible">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3">Device</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3 text-right">Value</th>
                    <th class="px-6 py-3 text-right">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($devices as $device)
                    <tr class="bg-white dark:bg-gray-900 hover:bg-indigo-50 dark:hover:bg-gray-800 transition-colors duration-150 rounded-md">
                        <td class="px-4 py-2 font-medium">{{ $device->name }}</td>
                        <td class="px-4 py-2">{{ $device->color }}</td>
                        <td class="px-4 py-2">{{ $device->category }}</td>
                        <td class="px-4 py-2 text-right font-semibold text-green-600 dark:text-green-400">${{ number_format($device->value, 2) }}</td>
                        <td class="px-4 py-2">
                            @if($device->user_id)
                                <span class="inline-flex items-center px-2 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-200">
                                    Assigned
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-200">
                                    Unassigned
                                </span>
                            @endif
                        </td>

   <td class="px-4 py-2 text-right">
    <div x-data="dropdownMenu()" x-init="init()" class="relative inline-block text-left w-full sm:w-auto">
        <!-- Action Button -->
        <button
            x-ref="button"
            @click="toggle"
            @keydown.escape.window="open = false"
            type="button"
            class="w-full sm:w-auto justify-between text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Actions
            <svg class="w-2.5 h-2.5 ml-2" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-width="2" d="M1 1l4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown -->
       <!-- Dropdown -->
<div
    x-show="open"
    x-ref="dropdown"
    x-transition
    @click.away="open = false"
    x-cloak
    :style="style"
    class="fixed z-50 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black/10 focus:outline-none"
>
        <div class="py-1 text-sm text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 rounded-md shadow-xl border border-gray-200 dark:border-gray-700">

            <!-- Edit Button -->
            <button
                wire:click="loadDevice({{ $device->id }})"
                @click="close"
                class="block w-full text-left px-4 py-2 hover:bg-blue-50 dark:hover:bg-blue-600 hover:text-blue-700 dark:hover:text-white transition-colors"
            >
                ✏️ <strong>Edit</strong>
            </button>

            <!-- Delete Button -->
            <button
                wire:click="delete({{ $device->id }})"
                onclick="confirm('Are you sure you want to delete this device?') || event.stopImmediatePropagation()"
                @click="close"
                class="block w-full text-left px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-600 hover:text-red-700 dark:hover:text-white transition-colors"
            >
                🗑️ <strong>Delete</strong>
            </button>

        @if (!$device->user_id)
            <!-- Assign Button only when it is not attatched to a user-->
                    <button
                        wire:click="openAssignModal({{ $device->id }})"
                        class="block w-full text-left px-4 py-2 text-green-600 dark:text-green-400 hover:bg-green-50 dark:hover:bg-green-600 hover:text-green-700 dark:hover:text-white transition-colors"
                    >
                        ✅ <strong>Assign</strong>
                    </button>
        @endif
      
    @if($device->user_id)
     <!-- Unassign Button -->
            <button
                wire:click="reassignDevice({{ $device->id }}, 'unassign')"
                @click="close"
                class="block w-full text-left px-4 py-2 text-yellow-600 dark:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-600 hover:text-yellow-700 dark:hover:text-white transition-colors"
            >
                🔁 <strong>Unassign</strong>
            </button>

    @endif
 </div>

        </div>
    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400 italic">
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

     <!-- Main content -->
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <!-- Mobile dropdown -->
        <div class="sm:hidden border-b border-gray-200 dark:border-gray-600 p-4">
            <label for="inventoryTabs" class="sr-only">Select location</label>
            <select id="inventoryTabs" class="block w-full p-2 text-sm bg-gray-50 border-0 border-b border-gray-200 text-gray-900 rounded-t-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" onchange="document.getElementById(this.value).click();">
                <option value="hq-tab" selected>HQ Inventory</option>
                <option value="tatu-tab">Tatu City Inventory</option>
                <option value="fgs2-tab">FGS2 Inventory</option>
                <option value="wall-tab">Wall Street Inventory</option>
                <option value="mombasa-tab">Mombasa Inventory</option>
                <option value="tonners-tab">Toner Stock</option>
            </select>
        </div>

        <!-- Desktop tabs -->
        <ul id="inventoryTab" class="hidden sm:flex text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-t-lg dark:divide-gray-600 dark:text-gray-400" data-tabs-toggle="#inventoryTabContent" role="tablist">
            <li class="w-full">
                <button id="hq-tab" data-tabs-target="#hq" type="button" role="tab" aria-controls="hq" aria-selected="true" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">HQ Inventory</button>
            </li>
            <li class="w-full">
                <button id="tatu-tab" data-tabs-target="#tatu" type="button" role="tab" aria-controls="tatu" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">Tatu City Inventory</button>
            </li>
            <li class="w-full">
                <button id="fgs2-tab" data-tabs-target="#fgs2" type="button" role="tab" aria-controls="fgs2" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">FGS2 Inventory</button>
            </li>
            <li class="w-full">
                <button id="wall-tab" data-tabs-target="#wall" type="button" role="tab" aria-controls="wall" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">Wall Street Inventory</button>
            </li>
            <li class="w-full">
                <button id="mombasa-tab" data-tabs-target="#mombasa" type="button" role="tab" aria-controls="mombasa" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">Mombasa Inventory</button>
            </li>
            <li class="w-full">
                <button id="tonners-tab" data-tabs-target="#tonners" type="button" role="tab" aria-controls="tonners" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 dark:hover:bg-gray-600 border-b-2 border-transparent hs-tab-active:border-indigo-600 hs-tab-active:text-indigo-600 focus:outline-none">Toner Stock</button>
            </li>
        </ul>

        <!-- Tab content -->
        <div id="inventoryTabContent" class="border-t border-gray-200 dark:border-gray-600">
            <!-- HQ -->
            <div id="hq" role="tabpanel" aria-labelledby="hq-tab" class="p-6 md:p-8">
                <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 text-gray-900 dark:text-white">
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">120</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Laptops</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">45</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Desktops</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">30</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Printers Managed by Kim-Fay</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">40</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Printers Managed by MFI</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">40</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Television Sets</dd>
                    </div>
                </dl>

                <div class="overflow-x-auto rounded-lg ring-gray-200 dark:ring-gray-700 mt-4">
                    @livewire('devices')
                </div>
            </div>

            <!-- Other tabs content... -->
            <div id="tatu" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="tatu-tab">
                <p class="text-gray-600 dark:text-gray-300">Tatu City Inventory data here…</p>
            </div>
            <!-- Other tabs... -->
        </div>
    </div>




</div>
