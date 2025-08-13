<div>
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-4">
            <img src="{{ asset('images/kimfay.png') }}" class="h-10 w-25 mx-auto" alt="Logo" />
            <h1 class="text-center text-2xl font-semibold text-gray-900 dark:text-white mt-2">Reset Password</h1>
        </div>

        <form wire:submit.prevent="resetPassword">
            <input type="hidden" wire:model="token">
            
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                <input type="email" wire:model="email" id="email" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                       readonly>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                <input type="password" wire:model="password" id="password" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                       placeholder="••••••••" required>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                <input type="password" wire:model="password_confirmation" id="password_confirmation" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                       placeholder="••••••••" required>
            </div>

            <button type="submit" 
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Reset Password
            </button>
        </form>

        <div class="text-sm text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Back to login</a>
        </div>
    </div>
</div>