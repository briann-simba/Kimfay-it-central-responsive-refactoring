
<div>

<nav x-cloak class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-700 dark:text-gray-200" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li class="inline-flex items-center">
            <svg class="w-4 h-4 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M7.05 5.05a.7.7 0 011 0l4.9 4.9a.7.7 0 010 1l-4.9 4.9a.7.7 0 01-1-1l4.4-4.4-4.4-4.4a.7.7 0 010-1z" />
            </svg>
            <span class="text-gray-900 dark:text-white">Hr Onboard New Staff Page</span>
        </li>
    </ol>
</nav>

<div x-cloak class="flex flex-col md:flex-row gap-4">


    <!-- Card 2 -->
    <div class="max-w-sm md:w-1/3 pb-3">
        <!-- card content here -->
          <a wire:navigate href="{{ route('continue-onboarding') }}"
       class="group block p-6 border rounded-lg shadow transition
              border-gray-200 dark:border-gray-700
              bg-white dark:bg-gray-800
              hover:bg-green-400 hover:border-green-400 hover:text-white
              dark:hover:bg-green-500 dark:hover:border-green-500">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-green-100 dark:bg-gray-700 rounded-full transition group-hover:bg-white group-hover:dark:bg-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600 dark:text-green-400 group-hover:text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <!-- Play icon -->
                    <path d="M6.5 5.5l7 4.5-7 4.5v-9z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold dark:text-white">Continue Onboarding</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Resume an existing session</p>
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
                <h3 class="text-lg font-semibold dark:text-white">Back to Induction Progress</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">View Induction progress</p>
            </div>
        </div>
    </a>
    </div>
</div>

<div x-cloak class="w-full h-full flex flex-col bg-white shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 
                dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 
                text-gray-800 dark:text-white tracking-tight p-4 md:p-6 flex-shrink-0">
        <h1 class="text-xl md:text-2xl font-bold flex items-center">
            <i class="fas fa-user-plus mr-2 md:mr-3"></i>HR User Onboarding
        </h1>
        <p class="mt-1 md:mt-2 text-sm md:text-base opacity-90">
            Streamlined process for adding new team members
        </p>
    </div>

    <div class="w-full flex flex-col items-center p-4 md:p-6 flex-grow overflow-auto">
        <!-- Stepper -->
        <div class="flex items-center w-full mb-6 md:mb-10 relative">
            @foreach ($steps as $index => $step)
                <div class="flex items-center w-1/3">
                    <div class="flex flex-col items-center w-full">
                        <!-- Step connector -->
                        @if ($index > 0)
                            <div class="h-2 flex-1 bg-gray-200 mx-[-10px] relative top-[-20px] z-0 
                                {{ $current > $index + 1 ? 'bg-green-500' : '' }}">
                            </div>
                        @endif

                        <!-- Step circle -->
                        <div class="relative z-10 flex items-center justify-center w-10 h-10 md:w-12 md:h-12 
                                    rounded-full font-semibold transition-all
                                    {{ $current === $step['id'] ? 'bg-indigo-600 text-white shadow-lg' : '' }}
                                    {{ $current > $step['id'] ? 'bg-green-500 text-white' : '' }}
                                    {{ $current < $step['id'] ? 'bg-gray-200 text-gray-500' : '' }}">
                            @if ($current > $step['id'])
                                <i class="fas fa-check text-sm md:text-base"></i>
                            @else
                                <span class="text-sm md:text-base">{{ $step['id'] }}</span>
                            @endif
                        </div>

                        <!-- Step label -->
                        <div class="text-center mt-2">
                            <div class="text-xs md:text-sm font-medium">{{ $step['title'] }}</div>
                            <div class="text-xs text-gray-500 mt-1 hidden md:block">{{ $step['description'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Progress bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-4 md:mb-6">
            <div class="bg-indigo-600 h-2 rounded-full transition-all duration-500" 
                 style="width: {{ ($current / count($steps)) * 100 }}%">
            </div>
        </div>

        <!-- Tab Content -->
        <div class="w-full flex-grow overflow-auto">
            
            <!-- STEP 1: Personal Info -->
            @if ($current === 1)
                <div class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                    <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                        <i class="fas fa-user-circle mr-2"></i> Personal Information
                    </h2>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                        Please provide the new employee's details. Details marked with (*) are mandatory.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 flex-grow overflow-auto">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                            <input type="text" wire:model="formData.personal.firstName"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Enter first name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                            <input type="text" wire:model="formData.personal.lastName"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Enter last name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                            <input type="email" wire:model="formData.personal.email"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="employee@company.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" wire:model="formData.personal.phone"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="(123) 456-7890">
                            @error('formData.personal.phone')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Position *</label>
                            <input type="text" wire:model="formData.personal.position"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Job title">
                            @error('formData.personal.position')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department *</label>
                            <select wire:model="formData.personal.department"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Department</option>
                                <option>Engineering</option>
                                <option>Marketing</option>
                                <option>Sales</option>
                                <option>Human Resources</option>
                                <option>Finance</option>
                                <option>Operations</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Start Date *</label>
                            <input type="date" wire:model="formData.personal.startDate"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Manager *</label>
                            <input type="text" wire:model="formData.personal.manager"
                                   class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Manager's name">
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button wire:click="next"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-lg flex items-center">
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            @endif

            <!-- STEP 2: Documentation -->
            @if ($current === 2)
                <div class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                    <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                        <i class="fas fa-file-alt mr-2"></i> Documentation
                    </h2>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Confirm receipt of documents.</p>
                    
                    <div class="space-y-3 flex-grow overflow-auto">
                        <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <input type="checkbox" wire:model="formData.documents.contract" class="h-5 w-5 text-indigo-600">
                            <span class="ml-3 font-medium">Employment Contract</span>
                        </label>
                        <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <input type="checkbox" wire:model="formData.documents.idCopy" class="h-5 w-5 text-indigo-600">
                            <span class="ml-3 font-medium">ID Copy</span>
                        </label>
                        <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <input type="checkbox" wire:model="formData.documents.taxForm" class="h-5 w-5 text-indigo-600">
                            <span class="ml-3 font-medium">Tax Form</span>
                        </label>
                        <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <input type="checkbox" wire:model="formData.documents.nda" class="h-5 w-5 text-indigo-600">
                            <span class="ml-3 font-medium">NDA Agreement</span>
                        </label>
                    </div>
                    
                    <div class="mt-6 flex justify-between">
                        <button wire:click="prev"
                                class="text-gray-600 hover:text-gray-800 font-medium py-2 px-5 rounded-lg flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </button>
                        <button wire:click="next"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-lg flex items-center">
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            @endif

            <!-- STEP 3: Confirmation -->
            @if ($current === 3)
                <div class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                    <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i> Confirmation
                    </h2>
                    
                    <div class="bg-gray-50 p-4 md:p-6 rounded-lg mb-4 md:mb-6 flex-grow overflow-auto">
                        <h3 class="font-medium text-md md:text-lg mb-3 md:mb-4 text-indigo-600">Personal Info</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            <div><span class="text-gray-600">Name:</span> {{ $formData['personal']['firstName'] }} {{ $formData['personal']['lastName'] }}</div>
                            <div><span class="text-gray-600">Email:</span> {{ $formData['personal']['email'] }}</div>
                            <div><span class="text-gray-600">Phone:</span> {{ $formData['personal']['phone'] ?: 'Not provided' }}</div>
                            <div><span class="text-gray-600">Position:</span> {{ $formData['personal']['position'] }}</div>
                            <div><span class="text-gray-600">Department:</span> {{ $formData['personal']['department'] }}</div>
                            <div><span class="text-gray-600">Start Date:</span> {{ $formData['personal']['startDate'] }}</div>
                            <div><span class="text-gray-600">Manager:</span> {{ $formData['personal']['manager'] }}</div>
                        </div>

                        <h3 class="font-medium text-md md:text-lg mt-4 md:mt-6 mb-3 md:mb-4 text-indigo-600">Documents</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            @foreach ($formData['documents'] as $doc => $status)
                                <div>
                                    <span class="text-gray-600">{{ ucfirst($doc) }}:</span>
                                    <span class="{{ $status ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $status ? 'Received' : 'Pending' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <button wire:click="prev"
                                class="text-gray-600 hover:text-gray-800 font-medium py-2 px-5 rounded-lg flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </button>
                        <button wire:click="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-5 rounded-lg flex items-center">
                            <i class="fas fa-check-circle mr-2"></i> Complete Onboarding
                        </button>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Footer -->
    <div class="bg-gray-100 p-3 md:p-4 text-center text-xs md:text-sm text-gray-600 flex-shrink-0">
        <p>© 2025 KIM-FAY EA LTD. All rights reserved.</p>
    </div>

</div>




</div>