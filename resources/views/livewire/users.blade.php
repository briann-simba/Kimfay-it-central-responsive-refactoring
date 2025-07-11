<div class="p-6 bg-white rounded shadow">
    <input
        type="text"
        wire:model.debounce.300ms="search"
        placeholder="Search..."
        class="border px-3 py-2 rounded w-full mb-4"
    >

    <p class="text-sm text-gray-600 mb-4">Search term: "{{ $search }}"</p>

    <ul class="space-y-2">
        @forelse ($devices as $device)
            <li class="p-2 border rounded">{{ $device->name }} ({{ $device->category }})</li>
        @empty
            <li class="text-gray-500 italic">No devices found.</li>
        @endforelse
    </ul>

    <div class="mt-4">
        {{ $devices->links() }}
    </div>
</div>
