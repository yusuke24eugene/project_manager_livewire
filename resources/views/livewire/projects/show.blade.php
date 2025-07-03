<div class="p-6 bg-white rounded shadow flex justify-between items-start">
    <!-- Left side: Project Details -->
    <div>
        <h1 class="text-2xl font-bold">{{ $project->name }}</h1>
        <p class="text-gray-600 mt-2">{{ $project->description }}</p>

        <div class="mt-4">
            <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->start)->format('F d, Y') }}<br>
            <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($project->deadline)->format('F d, Y') }}<br>
            <strong>Owner:</strong> {{ $project->user->name ?? 'Unknown' }}
        </div>
    </div>
    <!-- Right side: Buttons (Edit/Delete) -->
    <div class="flex flex-col items-end space-y-2 w-32">
        <a href="{{ route('projects.edit', $project->id) }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full text-center">
            Edit
        </a>

        <form wire:submit.prevent="deleteProject" class="w-full">
            <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 w-full">
                Delete
            </button>
        </form>
    </div>

</div>
