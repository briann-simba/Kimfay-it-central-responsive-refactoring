<div>
    <x-slot name="navguide">
        <nav class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
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
            <!-- Report Discrepancy Button -->
    {{-- <button wire:click="openReportModal" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.008v.008H12V17z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.29 3.86l-7.482 13.5A1.5 1.5 0 004.018 19.5h15.964a1.5 1.5 0 001.31-2.14l-7.482-13.5a1.5 1.5 0 00-2.62 0z" />
        </svg>
        Report discrepancy
    </button> --}}
    <!-- Report Discrepancy Button - Now using Alpine.js -->
            <button x-data @click="$dispatch('open-report-modal')" 
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.008v.008H12V17z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.29 3.86l-7.482 13.5A1.5 1.5 0 004.018 19.5h15.964a1.5 1.5 0 001.31-2.14l-7.482-13.5a1.5 1.5 0 00-2.62 0z" />
                </svg>
                Report discrepancy
            </button>
        </div>

            <p class="mb-6 text-gray-600 dark:text-gray-400 max-w-3xl leading-relaxed">
                Below is the list of company‑issued devices assigned to you. If you notice any discrepancy, please let the IT team know.
            </p>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg ring-1 ring-gray-200 dark:ring-gray-700">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 sm:px-6 py-3">Device</th>
                        <th class="px-4 sm:px-6 py-3">Color</th>
                        <th class="px-4 sm:px-6 py-3">Category</th>
                        <th class="px-4 sm:px-6 py-3 text-right">Value</th>
                        <th class="px-4 sm:px-6 py-3 text-right">Status</th>
                        <th class="px-4 sm:px-6 py-3 text-right">Comment</th>
                        <th class="px-4 sm:px-6 py-3 text-right"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse(auth()->user()->devices as $device)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-4 sm:px-6 py-4">{{ $device->name }}</td>
                            <td class="px-4 sm:px-6 py-4">{{ $device->color }}</td>
                            <td class="px-4 sm:px-6 py-4">{{ $device->category }}</td>
                            <td class="px-4 sm:px-6 py-4 text-right">${{ number_format($device->value, 2) }}</td>
                            <td class="px-4 sm:px-6 py-4 text-right">
                                @if(!$device->line_manager_approval || !$device->user_accepted)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 dark:bg-red-200 dark:text-red-900 rounded-full">Inactive</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 dark:bg-green-200 dark:text-green-900 rounded-full">Active</span>
                                @endif
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-right">
                                @if (!$device->line_manager_approval)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 dark:bg-yellow-200 dark:text-yellow-900 rounded-full">Waiting for line manager approval</span>
                                @elseif (!$device->user_accepted)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-orange-800 bg-orange-100 dark:bg-orange-200 dark:text-orange-900 rounded-full">Waiting for user acceptance</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 dark:bg-green-200 dark:text-green-900 rounded-full">In use</span>
                                @endif
                            </td>
                     <td class="px-4 sm:px-6 py-4 text-right">
    <div x-data="{ open: false }">
        <button
            @click="open = true"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed"
            @if (!$device->line_manager_approval || ($device->line_manager_approval && $device->user_accepted))
                disabled
            @endif
        >
            Accept
        </button>

        <!-- Modal -->
        <div 
            x-show="open" 
            x-cloak 
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/30 dark:bg-gray-900/40 px-4"
        >
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Action</h2>
                <p class="mb-6 text-sm text-gray-600 dark:text-gray-300">
                    Are you sure you want to accept this device?
                </p>
                <div class="flex justify-end gap-2">
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
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
                                You have no devices assigned.
                            </td>
                        </tr>
                    @endforelse
                    
                    <!-- Repeat rows dynamically here -->
                </tbody>
            </table>
        </div>
    </div>

<!-- Alpine.js Controlled Modal -->
    <div x-data="discrepancyModal()" 
         x-init="initModal()"
         @open-report-modal.window="openModal()">
        <!-- Modal content remains the same -->
          <!-- Modal -->

        <div x-show="showModal" 
        x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/30 dark:bg-gray-900/30 z-40 flex items-center justify-center p-4">
            <div @click.away="closeModal" class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-xl">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Report Issue</h3>
                    
                    <form @submit.prevent="submitReport">
                        <div class="space-y-4">
                            <!-- Device Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Affected Device</label>
                                <select x-model="selectedDevice" class="w-full p-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg">
                                    <option value="">Select a device</option>
                                    <template x-for="device in userDevices" :key="device.id">
                                        <option :value="device.id" x-text="`${device.name} (${device.category})`"></option>
                                    </template>
                                </select>
                                <span x-show="errors.selectedDevice" class="text-red-500 text-xs" x-text="errors.selectedDevice"></span>
                            </div>
                            
                            <!-- Category Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Issue Category</label>
                                <select x-model="selectedCategory" class="w-full p-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg">
                                    <option value="">Select a category</option>
                                    <template x-for="(category, key) in discrepancyCategories" :key="key">
                                        <option :value="key" x-text="category"></option>
                                    </template>
                                </select>
                                <span x-show="errors.selectedCategory" class="text-red-500 text-xs" x-text="errors.selectedCategory"></span>
                            </div>
                            
                            <!-- Comments -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your Comments</label>
                                <textarea x-model="userComments" rows="4" class="w-full p-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg" placeholder="Describe the issue..."></textarea>
                                <span x-show="errors.userComments" class="text-red-500 text-xs" x-text="errors.userComments"></span>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" @click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-600 dark:text-white">
                                Cancel
                            </button>
                            <button type="submit" 
        :disabled="isLoading"
        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 disabled:opacity-75 disabled:cursor-not-allowed"
        x-text="isLoading ? 'Sending...' : 'Submit Report'">
</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('reportMessage'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)" 
             class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('reportMessage') }}
        </div>
    @endif
</div>

<script>
    function discrepancyModal() {
        return {
            showModal: false,
            selectedDevice: '',
            selectedCategory: '',
            userComments: '',
            isLoading: false,
            discrepancyCategories: @json($discrepancyCategories),
            userDevices: @json($userDevices),
            errors: {},
            
            initModal() {
                // This ensures Alpine has fully initialized
                this.$nextTick(() => {
                    // Any initialization code if needed
                });
            },
            
            openModal() {
                this.showModal = true;
            },
            
            closeModal() {
                this.showModal = false;
                this.resetForm();
            },
            
            resetForm() {
                this.selectedDevice = '';
                this.selectedCategory = '';
                this.userComments = '';
                this.errors = {};
                this.isLoading = false;
            },
            
            validate() {
                this.errors = {};
                
                if (!this.selectedDevice) {
                    this.errors.selectedDevice = 'Please select a device';
                }
                
                if (!this.selectedCategory) {
                    this.errors.selectedCategory = 'Please select a category';
                }
                
                if (!this.userComments || this.userComments.length < 10) {
                    this.errors.userComments = 'Comments must be at least 10 characters';
                }
                
                return Object.keys(this.errors).length === 0;
            },
            
            async submitReport() {
                if (!this.validate() || this.isLoading) return;
                
                this.isLoading = true;
                
                try {
                    await @this.sendReport(
                        this.selectedDevice,
                        this.selectedCategory,
                        this.userComments
                    );
                    
                    this.closeModal();
                } catch (error) {
                    console.error('Error submitting report:', error);
                    this.isLoading = false;
                }
            }
        }
    }
</script>

      

{{-- @if (session()->has('reportMessage'))
 <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
     {{ session('reportMessage') }}
 </div>
@endif --}}
</div>
