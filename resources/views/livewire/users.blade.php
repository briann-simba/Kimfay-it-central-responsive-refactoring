<div>
    <!-- Main Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
        {{-- <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-tight">User Management</h2> --}}

        <!-- Search Section -->
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Search users...</h3>
            <div class="relative max-w-lg">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search users..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-9"
                >
                <svg class="absolute right-3 top-2 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" />
                </svg>
            </div>
        </div>

        <!-- Users Table - Added responsive container -->
        <div class="overflow-x-auto">
            <div class="min-w-[1024px] lg:min-w-0"> <!-- Will only force scroll on screens < 1024px -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-[15%]">Name</th>
                            <th scope="col" class="px-4 py-3 w-[20%]">Email</th>
                            <th scope="col" class="px-4 py-3 w-[15%]">Designation</th>
                            <th scope="col" class="px-4 py-3 w-[15%]">Department</th>
                            <th scope="col" class="px-4 py-3 w-[15%]">Role</th>
                            <th scope="col" class="px-4 py-3 w-[20%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate max-w-[150px]">
                                    {{ $user->name }}
                                </td>
                                <td class="px-4 py-4 truncate max-w-[200px]">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-4 truncate max-w-[150px]">
                                    {{ $user->designation->name }}
                                </td>
                                <td class="px-4 py-4 truncate max-w-[150px]">
                                    {{ $user->department->name }}
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex flex-wrap gap-1">
                                        @if($user->roles->isNotEmpty())
                                            @foreach($user->roles->unique('name') as $role)
                                                <span class="px-2 py-0.5 text-xs font-medium rounded-full 
                                                    @if($role->name === 'admin') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                                    @elseif($role->name === 'manager') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300
                                                    @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">
                                                    {{ ucfirst($role->name) }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                                No role
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button 
                                            wire:click="$parent.editUser({{ $user->id }})"
                                            @click="showEditUserModal = true"
                                            class="px-3 py-1.5 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            wire:click="$parent.deleteUser({{ $user->id }})"
                                            wire:confirm="Are you sure you want to delete this user?"
                                            class="px-3 py-1.5 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            @if($users instanceof \Illuminate\Pagination\AbstractPaginator)
                {{ $users->links() }}
            @endif
        </div>
    </div>
</div>