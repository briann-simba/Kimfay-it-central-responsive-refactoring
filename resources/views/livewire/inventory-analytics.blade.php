<div>

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

               
            </div>

            <!-- Other tabs content... -->
            <div id="tatu" class="hidden p-6 md:p-8" role="tabpanel" aria-labelledby="tatu-tab">
                <p class="text-gray-600 dark:text-gray-300">Tatu City Inventory data here…</p>
            </div>
            <!-- Other tabs... -->
        </div>
    </div>




</div>
