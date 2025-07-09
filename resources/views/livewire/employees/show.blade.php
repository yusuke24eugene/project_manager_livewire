<div class="p-6 bg-white rounded shadow flex justify-between items-start">
    <!-- Left side: Employee Details -->
    <div>
        <h1 class="text-2xl font-bold">{{ $employee->name }}</h1>
        <p class="mt-2"><strong>Position:</strong> {{ $employee->position ?? 'Unknown' }}</p>
        <p class="mt-2"><strong>Status:</strong> {{ $employee->status ?? 'Unknown' }}</p>
    </div>
    <!-- Right side: Buttons (Edit/Delete) -->
    <div class="flex flex-col items-end space-y-2 w-32">
        <a href="{{ route('employees.edit', $employee->id) }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full text-center">
            Edit
        </a>

        <form wire:submit.prevent="delete" class="w-full">
            <button onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()"
                    wire:click="delete({{ $employee->id }})"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 w-full">
                Delete
            </button>
        </form>
    </div>
</div>
