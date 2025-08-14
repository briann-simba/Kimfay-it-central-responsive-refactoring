<div x-data>
    <!-- Search Box -->
    <div class="flex justify-end mb-8">
        <div class="relative w-full sm:w-72">
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search users..."
                class="w-full pl-10 pr-4 py-2 text-sm bg-white dark:bg-gray-800 text-gray-700 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" />
            </svg>
        </div>
    </div>

    <!-- users Table -->
    <div class="overflow-x-auto rounded-lg ring-1 ring-gray-200 dark:ring-gray-700 w-full">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="text-xs font-semibold uppercase bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-2 min-w-[120px]">NAME</th>
                    <th class="px-4 py-2 min-w-[180px]">EMAIL</th>
                    <th class="px-4 py-2 min-w-[120px]">DESIGNATION</th>
                    <th class="px-4 py-2 min-w-[120px]">DEPARTMENT</th>
                    <th class="px-4 py-2 min-w-[100px]">ROLE</th>
                    <th class="px-4 py-2 min-w-[160px]">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($users as $user)
                    <tr class="bg-white dark:bg-gray-900 hover:bg-indigo-50 dark:hover:bg-gray-800 transition-colors">
                        <td class="px-4 py-2 font-medium">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->designation->name }}</td>
                        <td class="px-4 py-2 text-right font-semibold">{{ $user->department->name }}</td>
                        <td class="px-4 py-2">
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <!-- Edit Button -->
                             <button wire:click="$parent.editUser({{ $user->id }})"
        @click="showEditUserModal = true"
        class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors">
    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
    </svg>
    Edit
</button>
                                
                                <!-- Delete Button -->
                                <button wire:click="$parent.deleteUser({{ $user->id }})"
                                        onclick="return confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"
                                        class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition-colors">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 italic">
                            No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-2 flex justify-end">
        @if($users instanceof \Illuminate\Pagination\AbstractPaginator)
        {{ $users->links() }}
        @endif
    </div>
</div>