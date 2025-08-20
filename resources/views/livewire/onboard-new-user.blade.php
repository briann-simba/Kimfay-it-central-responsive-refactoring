
<div>


<div class="flex flex-col md:flex-row gap-4">


    <!-- Card 2 -->
    <div class="max-w-sm md:w-1/3 pb-3">
        <!-- card content here -->
          <a href="#"
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
                <h3 class="text-lg font-semibold dark:text-white">Back to User Progress</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">View onboarding progress</p>
            </div>
        </div>
    </a>
    </div>
</div>

<div x-data="{
    current: 1,
    steps: [
        {id: 1, title: 'Personal Info', description: 'Enter employee details'},
        {id: 2, title: 'Documentation', description: 'Upload required documents'},
        {id: 3, title: 'Confirmation', description: 'Review and submit'}
    ],
    formData: {
        personal: {
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            position: '',
            department: '',
            startDate: '',
            manager: '',
            salary: ''
        },
        documents: {
            contract: false,
            idCopy: false,
            taxForm: false,
            nda: false
        }
    },
    next() {
        if (this.current < this.steps.length) this.current++;
    },
    prev() {
        if (this.current > 1) this.current--;
    },
    submit() {
        alert('Onboarding submitted successfully!');
        // In a real app, you would send data to the server here
    }
}" class="w-full h-full flex flex-col bg-white shadow-lg overflow-hidden">


    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-white tracking-tight p-4 md:p-6 flex-shrink-0">
        <h1 class="text-xl md:text-2xl font-bold flex items-center">
            <i class="fas fa-user-plus mr-2 md:mr-3"></i>HR User Onboarding
        </h1>
        <p class="mt-1 md:mt-2 text-sm md:text-base opacity-90">Streamlined process for adding new team members</p>
    </div>

    <div class="w-full flex flex-col items-center p-4 md:p-6 flex-grow overflow-auto">
        <!-- Stepper -->
        <div class="flex items-center w-full mb-6 md:mb-10 relative">
            <template x-for="(step, index) in steps" :key="step.id">
                <div class="flex items-center w-1/3">
                    <div class="flex flex-col items-center w-full">
                        <!-- Step connector -->
                        <div x-show="index > 0" class="h-2 flex-1 bg-gray-200 mx-[-10px] relative top-[-20px] z-0" :class="{'bg-green-500': current > index}"></div>
                        
                        <!-- Step circle -->
                        <div class="relative z-10 flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-full font-semibold transition-all"
                             :class="{
                                'bg-indigo-600 text-white shadow-lg': current === step.id,
                                'bg-green-500 text-white': current > step.id,
                                'bg-gray-200 text-gray-500': current < step.id
                             }">
                            <template x-if="current > step.id">
                                <i class="fas fa-check text-sm md:text-base"></i>
                            </template>
                            <template x-if="current <= step.id">
                                <span x-text="step.id" class="text-sm md:text-base"></span>
                            </template>
                        </div>
                        
                        <!-- Step label -->
                        <div class="text-center mt-2">
                            <div class="text-xs md:text-sm font-medium" x-text="step.title"></div>
                            <div class="text-xs text-gray-500 mt-1 hidden md:block" x-text="step.description"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Progress bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-4 md:mb-6">
            <div class="bg-indigo-600 h-2 rounded-full transition-all duration-500" 
                 :style="`width: ${(current / steps.length) * 100}%`"></div>
        </div>

        <!-- Tab Content -->
        <div class="w-full flex-grow overflow-auto">
            <!-- STEP 1: Personal Info -->
            <div x-show="current === 1" class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                    <i class="fas fa-user-circle mr-2"></i> Personal Information
                </h2>
                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Please provide the new employee's details. This information will be shared with IT, Admin, and Finance departments.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 flex-grow overflow-auto">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                        <input type="text" x-model="formData.personal.firstName" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="Enter first name">
                    </div>
                    
                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                        <input type="text" x-model="formData.personal.lastName" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="Enter last name">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" x-model="formData.personal.email" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="employee@company.com">
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" x-model="formData.personal.phone" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="(123) 456-7890">
                    </div>
                    
                    <!-- Position -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Position *</label>
                        <input type="text" x-model="formData.personal.position" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="Job title">
                    </div>
                    
                    <!-- Department -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Department *</label>
                        <select x-model="formData.personal.department" 
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                            <option value="">Select Department</option>
                            <option>Engineering</option>
                            <option>Marketing</option>
                            <option>Sales</option>
                            <option>Human Resources</option>
                            <option>Finance</option>
                            <option>Operations</option>
                        </select>
                    </div>
                    
                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start Date *</label>
                        <input type="date" x-model="formData.personal.startDate" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                    </div>
                    
                    <!-- Manager -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Manager *</label>
                        <input type="text" x-model="formData.personal.manager" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                               placeholder="Manager's name">
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <button @click="next()" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-lg flex items-center transition-all text-sm md:text-base">
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- STEP 2: Documentation -->
            <div x-show="current === 2" class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                    <i class="fas fa-file-alt mr-2"></i> Documentation
                </h2>
                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Confirm receipt of the required documents from the new employee.</p>
                
                <div class="space-y-3 flex-grow overflow-auto">
                    <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50 transition-all">
                        <input type="checkbox" x-model="formData.documents.contract" id="contract" class="h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="contract" class="ml-3 flex flex-col">
                            <span class="font-medium text-gray-900">Employment Contract</span>
                            <span class="text-sm text-gray-500">Signed and dated employment agreement</span>
                        </label>
                    </div>
                    
                    <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50 transition-all">
                        <input type="checkbox" x-model="formData.documents.idCopy" id="idCopy" class="h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="idCopy" class="ml-3 flex flex-col">
                            <span class="font-medium text-gray-900">ID Copy</span>
                            <span class="text-sm text-gray-500">Government-issued identification document</span>
                        </label>
                    </div>
                    
                    <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50 transition-all">
                        <input type="checkbox" x-model="formData.documents.taxForm" id="taxForm" class="h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="taxForm" class="ml-3 flex flex-col">
                            <span class="font-medium text-gray-900">Tax Forms</span>
                            <span class="text-sm text-gray-500">Completed W-4 or equivalent tax documentation</span>
                        </label>
                    </div>
                    
                    <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50 transition-all">
                        <input type="checkbox" x-model="formData.documents.nda" id="nda" class="h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="nda" class="ml-3 flex flex-col">
                            <span class="font-medium text-gray-900">NDA Agreement</span>
                            <span class="text-sm text-gray-500">Signed non-disclosure agreement</span>
                        </label>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-between">
                    <button @click="prev()" 
                            class="text-gray-600 hover:text-gray-800 font-medium py-2 px-5 rounded-lg flex items-center transition-all text-sm md:text-base">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </button>
                    <button @click="next()" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-lg flex items-center transition-all text-sm md:text-base">
                        Continue <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- STEP 3: Confirmation -->
            <div x-show="current === 3" class="p-4 md:p-6 rounded-xl bg-white shadow-sm h-full flex flex-col">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-indigo-700 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i> Confirmation
                </h2>
                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Review all information before completing the onboarding process.</p>
                
                <div class="bg-gray-50 p-4 md:p-6 rounded-lg mb-4 md:mb-6 flex-grow overflow-auto">
                    <h3 class="font-medium text-md md:text-lg mb-3 md:mb-4 text-indigo-600">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div><span class="text-gray-600">Name:</span> <span x-text="formData.personal.firstName + ' ' + formData.personal.lastName"></span></div>
                        <div><span class="text-gray-600">Email:</span> <span x-text="formData.personal.email"></span></div>
                        <div><span class="text-gray-600">Phone:</span> <span x-text="formData.personal.phone || 'Not provided'"></span></div>
                        <div><span class="text-gray-600">Position:</span> <span x-text="formData.personal.position"></span></div>
                        <div><span class="text-gray-600">Department:</span> <span x-text="formData.personal.department"></span></div>
                        <div><span class="text-gray-600">Start Date:</span> <span x-text="formData.personal.startDate"></span></div>
                        <div><span class="text-gray-600">Manager:</span> <span x-text="formData.personal.manager"></span></div>
                    </div>
                    
                    <h3 class="font-medium text-md md:text-lg mt-4 md:mt-6 mb-3 md:mb-4 text-indigo-600">Documentation Status</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <template x-for="(value, doc) in formData.documents">
                            <div>
                                <span class="text-gray-600" x-text="doc + ':'"></span>
                                <span :class="value ? 'text-green-600' : 'text-red-600'" x-text="value ? 'Received' : 'Pending'"></span>
                            </div>
                        </template>
                    </div>
                </div>
                
                <div class="flex items-center mb-4 md:mb-6">
                    <input type="checkbox" id="confirmation" class="h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500">
                    <label for="confirmation" class="ml-3 text-gray-700 text-sm md:text-base">
                        I confirm that all information is correct and required documents have been received.
                    </label>
                </div>
                
                <div class="flex justify-between">
                    <button @click="prev()" 
                            class="text-gray-600 hover:text-gray-800 font-medium py-2 px-5 rounded-lg flex items-center transition-all text-sm md:text-base">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </button>
                    <button @click="submit()" 
                            class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-5 rounded-lg flex items-center transition-all text-sm md:text-base">
                        <i class="fas fa-check-circle mr-2"></i> Complete Onboarding
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--footer -->
    <div class="bg-gray-100 p-3 md:p-4 text-center text-xs md:text-sm text-gray-600 flex-shrink-0">
        <p>© 2025 KIM-FAY EA LTD. All rights reserved.</p>
    </div>
    
        <div class="max-w-md w-full">
        <!-- Onboarding Card -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 card-hover cursor-pointer">
            <!-- Card Header with Icon -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                            <i class="fas fa-user-plus text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">Get Started</h2>
                            <p class="text-blue-100">Begin your journey with us</p>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-white/30">01</div>
                </div>
            </div>
            
            <!-- Card Content -->
            <div class="p-6">
                <p class="text-gray-600 mb-6">Complete your onboarding to unlock all features and personalize your experience.</p>
                
                <!-- Progress Bar -->
                <div class="mb-6">
                    <div class="flex justify-between text-sm text-gray-500 mb-2">
                        <span>Progress</span>
                        <span>2/5 steps</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full w-2/5"></div>
                    </div>
                </div>
                
                <!-- Steps List -->
                <div class="space-y-4 mb-6">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <span class="text-gray-700">Account Setup</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <span class="text-gray-700">Profile Information</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <span class="text-blue-600 font-medium">3</span>
                        </div>
                        <span class="text-gray-700 font-medium">Preferences</span>
                    </div>
                    <div class="flex items-center opacity-60">
                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3">
                            <span class="text-gray-400 font-medium">4</span>
                        </div>
                        <span class="text-gray-500">Connect Tools</span>
                    </div>
                    <div class="flex items-center opacity-60">
                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3">
                            <span class="text-gray-400 font-medium">5</span>
                        </div>
                        <span class="text-gray-500">Training</span>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-xl transition duration-300 flex items-center justify-center">
                    Continue Onboarding
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
    </div>
</div>

</div>