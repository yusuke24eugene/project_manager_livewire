<div class="p-6 bg-white rounded shadow flex justify-between items-start">
    <!-- Left side: Project Details -->
    <div>
        <h1 class="text-2xl font-bold">{{ $task->title }}</h1>
        <p class="text-gray-600 mt-2">{{ $task->description }}</p>

        <div class="mt-4">
            <strong>Project Name:</strong> {{ $project->name }}<br>
            <strong>Employee Name:</strong> {{ $employee->name }}<br>
            <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($task->start)->format('F d, Y') }}<br>
            <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('F d, Y') }}<br>
            <strong>Status:</strong> @if ($task->status === 'todo')
                                        <span class="text-gray-500">To Do</span>
                                    @elseif ($task->status === 'in_progress')
                                        <span class="text-blue-500">In Progress</span>
                                    @elseif ($task->status === 'done')
                                        <span class="text-green-600 font-semibold">Done</span>
                                    @else
                                        <span class="text-red-500">Unknown</span>
                                    @endif<br>
            <strong>Owner:</strong> {{ $task->user->name ?? 'Unknown' }}
        </div>
    </div>
    <!-- Right side: Buttons (Edit/Delete) -->
    <div class="flex flex-col items-end space-y-2 w-32">
        <a href="{{ route('tasks.edit', $task->id) }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full text-center">
            Edit
        </a>

        <form wire:submit.prevent="delete" class="w-full">
            <button onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()"
                    wire:click="delete({{ $task->id }})"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 w-full">
                Delete
            </button>
        </form>
    </div>
</div>
