<div>
<h2>Hr Tracking user Onboarding</h2>
    <div x-data="{ current: 1 }" class="w-full flex flex-col items-center mt-10 mx-auto">

    <!-- Stepper -->
    <div class="flex flex-col sm:flex-row items-center w-full max-w-3xl mb-6">
        <!-- Step Component -->
        <template x-for="step in [1, 2, 3]" :key="step">
            <div class="flex flex-col items-center w-full sm:w-1/3 cursor-pointer"
                 @click="current = step">
                <div
                    :class="{
                        'bg-indigo-600 text-white': current === step,
                        'bg-green-500 text-white': current > step,
                        'bg-gray-200 text-gray-600': current < step
                    }"
                    class="flex items-center justify-center w-10 h-10 rounded-full font-semibold transition">
                    <template x-if="current > step">✅</template>
                    <template x-if="current === step"><span x-text="step"></span></template>
                </div>
                <span class="mt-2 text-sm font-medium" x-text="step === 1 ? 'Personal Info' : step === 2 ? 'Documentation' : 'Confirmation'"></span>
            </div>
        </template>
    </div>

    <!-- Tab Content -->
    <div class="w-full max-w-3xl">
        <!-- STEP 1 TAB -->
        <div x-show="current === 1" class="p-4 border rounded-lg bg-gray-50">
            <h2 class="text-lg font-semibold mb-2 text-indigo-700">Personal Info</h2>
            <p class="text-gray-600 text-sm">There will be a form whereby the HR creates a user by providing the required user details and notification will be sent to the stakeholders that is the IT, Admin, and Finance.</p>
            <!-- Your form fields go here -->
        </div>

        <!-- STEP 2 TAB -->
        <div x-show="current === 2" class="p-4 border rounded-lg bg-gray-50">
            <h2 class="text-lg font-semibold mb-2 text-indigo-700">Documentation</h2>
            <p class="text-gray-600 text-sm">This is whereby the HR confirms the receipt of the required or requested documents</p>
        </div>

        <!-- STEP 3 TAB -->
        <div x-show="current === 3" class="p-4 border rounded-lg bg-gray-50">
            <h2 class="text-lg font-semibold mb-2 text-indigo-700">Confirmation</h2>
            <p class="text-gray-600 text-sm">This is the Confirmation tab content.</p>
        </div>
    </div>

</div>


</div>
