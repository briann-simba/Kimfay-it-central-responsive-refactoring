<div>



<x-slot name="navguide">

@if (session()->has('message'))
    <div class="mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg dark:bg-green-900 dark:text-green-200 dark:border-green-800">
        {{ session('message') }}
    </div>
@endif
    <div class="flex items-center justify-between mb-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li class="inline-flex items-center">
                    <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
                    </svg>
                    <span class="text-gray-900 dark:text-white">Kim‑Fay Inventory &amp; Assets</span>
                </li>
            </ol>
        </nav>
        
            <div>



        <!-- Add Inventory Button -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Inventory
        </button>
    </div>
</x-slot>

<x-slot name="header1">
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <!-- Mobile: dropdown (Flowbite not required) -->
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

        <!-- Desktop: Flowbite full‑width tabs -->
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

                    <div class="overflow-x-auto rounded-lg  ring-gray-200 dark:ring-gray-700 mt-4">

                        @livewire('devices')
                    </div>
            </div>
        </div>

            <!-- Tatu City -->
            <div id="tatu" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="tatu-tab">
                <p class="text-gray-600 dark:text-gray-300">Tatu City Inventory data here…</p>
            </div>

            <!-- FGS2 -->
            <div id="fgs2" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="fgs2-tab">
                <p class="text-gray-600 dark:text-gray-300">FGS2 Inventory data here…</p>
            </div>

            <!-- Wall Street -->
            <div id="wall" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="wall-tab">
                <p class="text-gray-600 dark:text-gray-300">Wall Street Inventory data here…</p>
            </div>

            <!-- Mombasa -->
            <div id="mombasa" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="mombasa-tab">
                <p class="text-gray-600 dark:text-gray-300">Mombasa Branch Inventory data here…</p>
            </div>

            <!-- Toners -->
            <div id="tonners" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="tonners-tab">
                <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-900 dark:text-white">
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">120</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Black Toners</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">45</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Cyan Toners</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">30</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Magenta Toners</dd>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded shadow">
                        <dt class="text-2xl font-bold">40</dt>
                        <dd class="text-sm text-gray-600 dark:text-gray-300">Yellow Toners</dd>
                    </div>
        </dl>
            </div>
        </div>
    </div>

</x-slot>

<!-- Main modal -->
                <div id="crud-modal" wire:ignore.self tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Create New Product
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>              
                  <!-- Modal body -->
                        <form wire:submit.prevent="create" class="p-4 md:p-5">
                                <div class="grid gap-4 mb-4 grid-cols-2">

                                    <!-- Name -->
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device Name</label>
                                        <input type="text" wire:model.defer="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., HP Laptop">
                                        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Value -->
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                                        <input type="number" wire:model="value" id="value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., 1500">
                                        @error('value') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select wire:model="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="">Select category</option>
                                            <option value="TV">TV/Monitor</option>
                                            <option value="PC">PC</option>
                                            <option value="GA">Gaming/Console</option>
                                            <option value="PH">Phones</option>
                                        </select>
                                        @error('category') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Color -->
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                                        <input type="text" wire:model.live="color" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., Silver">
                                        @error('color') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- User ID -->
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigned User ID</label>
                                        <input type="number" wire:model="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g., 12">
                                        @error('user_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Add Device
                                </button>
                            </form>

                    </div>
                </div>
                <button data-modal-hide="crud-modal" id="hiddenCloseBtn" class="hidden"></button>
            </div> 

          

</div>

@script
<script>
    $wire.on('close-crud-modal', () => {
        // Trigger Flowbite's built-in close by clicking the hidden button
        const closeBtn = document.getElementById('hiddenCloseBtn');
        if (closeBtn) {
            closeBtn.click(); // ✅ This will trigger Flowbite's full close behavior
        }

        // Optional safety fallback (in case Flowbite fails to clean up)
        document.body.classList.remove('overflow-hidden');


        
    });



</script>
@endscript


<script>
    
    document.addEventListener('livewire:load', () => {
        const modalEl = document.getElementById('crud-modal');
        if (modalEl) {
            // Manually initialize the modal if it hasn't been
            if (!window.Flowbite?.instances?.getInstance(modalEl)) {
                new window.Flowbite.Modal(modalEl);
            }
        }
    });


    window.addEventListener('close-crud-modal', () => {
        const modal = document.getElementById('crud-modal');
        const instance = window.Flowbite?.instances.getInstance(modal);
        instance?.hide();

        // ✅ Show toast
        const toast = document.createElement('div');
        toast.className = 'fixed top-6 right-6 z-[10000] bg-green-500 text-white px-4 py-2 rounded shadow';
        toast.innerText = '✅ Device added successfully';
        document.body.appendChild(toast);

        // Fade out after 3s
        setTimeout(() => {
            toast.classList.add('opacity-0');
        }, 3000);

        // Remove after 3.5s
        setTimeout(() => {
            toast.remove();
            // ✅ Optional redirect after close
            // window.location.href = "/devices"; // adjust to your desired route
        }, 3500);
    });
</script>


</div>