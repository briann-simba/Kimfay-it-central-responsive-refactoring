<div>

    <!-- Header -->
    <div class="flex flex-col p-2 sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white tracking-tight">Device Inventory</h2>

        <!-- Search Box -->
        <div class="relative w-full sm:w-72">
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search devices..."
                class="w-full pl-10 pr-4 py-2 text-sm bg-white dark:bg-gray-800 text-gray-700 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" />
            </svg>
        </div>
    </div>

<!-- Devices Table -->
 <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Device</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Color</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Value</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($devices as $device)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-300">
                            {{ $device->name }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            {{ $device->color }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                                {{ $device->category }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                            ${{ number_format($device->value, 2) }}
                        </td>
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
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
                                No Logs Found
                            </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-end">
        {{ $devices->links() }}
    </div>




    <!-- Assign Device Modal -->
<div 
    x-data="{ show: @entangle('showAssignModal') }"
    x-show="show"
    x-cloak
    x-trap.noscroll="show"
    x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60"
    @keydown.escape.window="show = false"
>
    <div 
        class="relative w-full max-w-3xl mx-4 sm:mx-6 md:mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden"
        @click.away="show = false"
    >
        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white text-center">
                Assign Device
            </h2>
        </div>

        <!-- Form Content -->
        <form wire:submit.prevent="assignDevice" class="grid grid-cols-1 md:grid-cols-2 gap-5 px-5 py-6">
            <!-- Left: Device Info -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-gray-700 dark:text-white">Device Details</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <label class="block text-gray-600 dark:text-white">Device Name</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-white">Color</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $color }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-white">Device Category</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $category }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Assignment Form -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-gray-700 dark:text-white">Assignment Details</h3>
                <div class="space-y-4 text-sm">
                    <!-- User Dropdown -->
                    <div>
                        <label class="block text-gray-600 dark:text-white">Select User</label>
                        <select wire:model.defer="user_id"
                                class="w-full border rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">-- Choose User --</option>
                            <option value="1">it officer</option>
                            <option value="2">Peter Musembi</option>
                            <option value="3">Ann Wambui</option>
                            <option value="4">Benson Karanja</option>
                            <option value="5">Mercy Nyambura</option>
                        </select>
                        @error('user_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <!-- Reason Dropdown -->
                    <div>
                        <label class="block text-gray-600 dark:text-white">Reason</label>
                        <select wire:model.defer="reason"
                                class="w-full border rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">-- Select Reason --</option>
                            <option value="New Assignment">New Assignment</option>
                            <option value="Replacement">Replacement</option>
                            <option value="Lost Device">Lost Device</option>
                            <option value="Department Change">Department Change</option>
                            <option value="Upgrade">Upgrade</option>
                        </select>
                        @error('reason')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <!-- Comment Textarea -->
                    <div>
                        <label class="block text-gray-600 dark:text-white">Comment</label>
                        <textarea wire:model.defer="comment" rows="4"
                                  class="w-full border rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                  placeholder="Optional note..."></textarea>
                        @error('comment')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="col-span-1 md:col-span-2 flex justify-end gap-3 pt-2">
                <button type="button" @click="show = false"
                        class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                    Assign Device
                </button>
            </div>
        </form>
    </div>
</div>



<div 
    x-data="{ show: @entangle('reassignDeviceModal') }"
    x-show="show"
    x-cloak
    x-trap.noscroll="show"
    x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60"
    @keydown.escape.window="show = false"
>
    <!-- Modal Box -->
    <div 
        class="relative w-full max-w-3xl mx-4 sm:mx-6 md:mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden"
        @click.away="show = false"
    >
        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white text-center">
                Unassign Device
            </h2>
        </div>

        <!-- Form Content -->
        <form wire:submit.prevent="unassignDevice" class="grid grid-cols-1 md:grid-cols-2 gap-5 px-5 py-6">
            <!-- Left: Device Info -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-gray-700 dark:text-white">Device Details</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <label class="block text-gray-600 dark:text-white">Current User</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $currentUser }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-600 dark:text-white">Device Name</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-600 dark:text-white">Color</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $color}}
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-600 dark:text-white">Device Category</label>
                        <div class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $category }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Reason & Comment -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-gray-700 dark:text-white">Unassignment Details</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <label class="block text-gray-600 dark:text-white">Reason for Unassigning</label>
                        <select wire:model.defer="reason"
                                class="w-full border rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">-- Select Reason --</option>
                            <option value="terminated">User Terminated</option>
                            <option value="transferred">Transferred</option>
                            <option value="returned">Device Returned</option>
                        </select>
                        @error('reason')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-gray-600 dark:text-white">Comment</label>
                        <textarea wire:model.defer="comment" rows="5"
                                  class="w-full border rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                  placeholder="Provide optional context for this unassignment..."></textarea>
                        @error('comment')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="col-span-1 md:col-span-2 flex justify-end gap-3 pt-2">
                <button type="button" @click="show = false"
                        class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
                    Unassign Device
                </button>
            </div>
        </form>
    </div>
</div>



    
<!-- Modal with Alpine entangled to Livewire -->
<div x-data="{ show: @entangle('showEditModal') }"
     x-show="show"
     x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
     x-transition>

    <!-- Modal Box -->
    <div @click.away="show = false"
         class="bg-white dark:bg-gray-700 rounded-lg shadow-lg w-full max-w-md p-6"
         x-transition.scale>
        <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Edit Device</h2>

       <form wire:submit.prevent="update" class="p-4 space-y-4">

            <div>
                <label for="edit-user-id" class="block text-sm font-medium text-gray-700 dark:text-white">User ID</label>
                <input id="edit-user-id" type="text" wire:model.defer="user_id"
                    class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
                @error('user_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="edit-name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                <input id="edit-name" type="text" wire:model.defer="name"
                    class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="edit-color" class="block text-sm font-medium text-gray-700 dark:text-white">Color</label>
                <input id="edit-color" type="text" wire:model.defer="color"
                    class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
                @error('color') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="edit-category" class="block text-sm font-medium text-gray-700 dark:text-white">Category</label>
                <input id="edit-category" type="text" wire:model.defer="category"
                    class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
                @error('category') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="edit-value" class="block text-sm font-medium text-gray-700 dark:text-white">Value</label>
                <input id="edit-value" type="text" wire:model.defer="value"
                    class="w-full p-2.5 mt-1 text-sm bg-gray-50 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white" />
                @error('value') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button"
                        @click="show = false"
                        class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg
                            hover:bg-gray-100 dark:text-white dark:border-gray-500 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg
                            hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                            dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>
    
<script>
function dropdownMenu() {
    return {
        open: false,
        style: '',

        toggle() {
            this.open = !this.open;
            if (this.open) this.setPosition();
        },

        setPosition() {
            this.$nextTick(() => {
                const button = this.$refs.button;
                const dropdown = this.$refs.dropdown;

                const buttonRect = button.getBoundingClientRect();
                const dropdownHeight = dropdown.offsetHeight;

                const spaceBelow = window.innerHeight - buttonRect.bottom;
                const spaceAbove = buttonRect.top;

                let top = buttonRect.bottom;
                let left = buttonRect.right - dropdown.offsetWidth;

                // Flip up if there's not enough space below
                if (spaceBelow < dropdownHeight && spaceAbove >= dropdownHeight) {
                    top = buttonRect.top - dropdownHeight;
                }

                // Set the style string
                this.style = `top:${top}px; left:${left}px;`;
            });
        },

        init() {
            window.addEventListener('scroll', () => { this.open = false });
            window.addEventListener('resize', () => { this.open = false });
        }
    };
}
</script>





</div>
