<div>

    <!-- Header -->
    <div class="flex flex-col p-2 sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
            📦 Device Inventory
        </h2>

   @if (session()->has('message'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg dark:bg-green-900 dark:text-green-200 dark:border-green-800"
    >
        {{ session('message') }}
    </div>
@endif



     

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
<div class="overflow-x-auto mt-4 rounded-lg border border-gray-200 dark:border-gray-700 overflow-visible">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3">Device</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3 text-right">Value</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($devices as $device)
                    <tr class="bg-white dark:bg-gray-900 hover:bg-indigo-50 dark:hover:bg-gray-800 transition-colors duration-150 rounded-md">
                        <td class="px-6 py-4 font-medium">{{ $device->name }}</td>
                        <td class="px-6 py-4">{{ $device->color }}</td>
                        <td class="px-6 py-4">{{ $device->category }}</td>
                        <td class="px-6 py-4 text-right font-semibold text-green-600 dark:text-green-400">${{ number_format($device->value, 2) }}</td>
   <td class="px-6 py-4 text-right">
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

<div class="py-1 text-sm text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800


 rounded-md shadow-xl border border-gray-200 dark:border-gray-700">
    <button
        wire:click="loadDevice({{ $device->id }})"
        @click="close"
        class="block w-full text-left px-4 py-2 hover:bg-blue-50 dark:hover:bg-blue-600 hover:text-blue-700 dark:hover:text-white transition-colors"
    >
        <b>    ✏️ Edit</b>
    </button>

    <button
        wire:click="delete({{ $device->id }})"
        onclick="confirm('Are you sure you want to delete this device?') || event.stopImmediatePropagation()"
        @click="close"
        class="block w-full text-left px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-600 hover:text-red-700 dark:hover:text-white transition-colors"
    >
        <b>    🗑️ Delete </b>
    </button>

    <button
        wire:click="reassignDevice({{ $device->id }})"
        @click="close"
        class="block w-full text-left px-4 py-2 text-yellow-600 dark:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-600 hover:text-yellow-700 dark:hover:text-white transition-colors"
    >
        <b>    🔁 Assign/Reassign</b>
    </button>
</div>

        </div>
    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
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

<div 
    x-data="{
        show: @entangle('reassignDeviceModal'),
        mode: @entangle('assignMode')
    }"
    x-init="$watch('show', value => { if (value && !mode) mode = 'assign' })"
    x-show="show"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    x-transition
>



    <!-- Modal Box -->
    <div 
        @click.away="show = false"
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl w-full max-w-xl p-6 sm:p-8"
        x-transition.scale
    >

        <!-- Heading -->
        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white" 
            x-text="mode === 'assign' ? 'Assign Device' : 'Reassign Device'">
        </h2>

        <!-- Form -->
        <form wire:submit.prevent="assign" class="space-y-5">

            <!-- Previous User (Reassign Mode Only) -->
            <div x-show="mode === 'reassign'" x-transition>
                <label for="previous_user" class="block text-sm font-medium text-gray-700 dark:text-white">
                    Previous User
                </label>
                <input type="text" id="previous_user" readonly
                    value="{{ _('Dennis Kememwa') }}"
                    class="mt-1 w-full rounded-lg border-gray-300 bg-gray-100 p-2.5 text-sm
                           dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
            </div>

            <!-- New User Dropdown -->
            <div>
                <label for="new_user_id" class="block text-sm font-medium text-gray-700 dark:text-white">Select User</label>
                <select id="new_user_id" wire:model.defer="new_user_id"
                        class="mt-1 w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm
                               focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">-- Select user --</option>
                    <option value="1">John Doe</option>
                    <option value="2">Jane Smith</option>
                </select>
                @error('new_user_id') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Reason -->
            <div>
                <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-white">Reason</label>
                <select id="reason" wire:model.defer="reason"
                        class="mt-1 w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm
                               focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">-- Select reason --</option>
                    <option value="termination">Termination</option>
                    <option value="replacement">Replacement</option>
                    <option value="faulty computer">Faulty Computer</option>
                </select>
                @error('reason') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Comment -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-white">Comment</label>
                <textarea id="comment" wire:model.defer="comment" rows="3"
                          class="mt-1 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm
                                 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                @error('comment') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Footer Buttons -->
            <div class="flex justify-between items-center pt-4">
                <!-- Toggle Button -->
                <button type="button"
                        @click="mode = mode === 'assign' ? 'reassign' : 'assign'"
                        class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                               border border-blue-600 text-blue-600 hover:bg-blue-50
                               dark:border-blue-400 dark:text-blue-300 dark:hover:bg-blue-900/20 transition">
                    <svg x-show="mode === 'assign'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    <svg x-show="mode === 'reassign'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8l-4 4m0 0l4 4m-4-4h14" />
                    </svg>
                    <span x-text="mode === 'assign' ? 'Switch to Reassign' : 'Switch to Assign'"></span>
                </button>

                <!-- Action Buttons -->
                <div class="flex gap-2">
                    <button type="button"
                            @click="show = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg
                                   hover:bg-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg
                                   hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                                   dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        <span x-text="mode === 'assign' ? 'Assign' : 'Reassign'"></span>
                    </button>
                </div>
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
