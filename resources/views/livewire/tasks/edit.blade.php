<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Create a New Task</h1>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">
        
        <!-- Title -->
        <div class="flex flex-col">
            <label for="title" class="text-sm font-semibold text-gray-700">Task Title</label>
            <input type="text" wire:model="title" id="title" class="mt-1 p-3 border border-gray-300 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
            @error('title')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="flex flex-col">
            <label for="description" class="text-sm font-semibold text-gray-700">Description</label>
            <textarea wire:model="description" id="description" class="mt-1 p-3 border border-gray-300 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Project -->
        <div class="flex flex-col">
            <label for="projectId" class="text-sm font-semibold text-gray-700">Project</label>
            <select type="text" wire:model="projectId" id="projectId" class="mt-1 p-3 border border-gray-300 rounded-lg @error('projectId') border-red-500 @enderror">
                <option value="{{ $projectId }}">{{ $projectName }}</option>
                @foreach ($projects as $project)
                    @if ($projectId != $project->id)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('projectId')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Employee -->
        <div class="flex flex-col">
            <label for="employeeId" class="text-sm font-semibold text-gray-700">Employee</label>
            <select type="text" wire:model="employeeId" id="employeeId" class="mt-1 p-3 border border-gray-300 rounded-lg @error('employeeId') border-red-500 @enderror">
                <option value="{{ $employeeId }}">{{ $employeeName }}</option>
                @foreach ($employees as $employee)
                    @if ($employeeId != $employee->id)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('employeeId')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Start Date -->
        <div class="flex flex-col">
            <label for="start" class="text-sm font-semibold text-gray-700">Start Date</label>
            <input type="date" wire:model="start" id="start" class="mt-1 p-3 border border-gray-300 rounded-lg @error('start') border-red-500 @enderror">
            @error('start')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Deadline -->
        <div class="flex flex-col">
            <label for="deadline" class="text-sm font-semibold text-gray-700">Deadline</label>
            <input type="date" wire:model="deadline" id="deadline" class="mt-1 p-3 border border-gray-300 rounded-lg @error('deadline') border-red-500 @enderror">
            @error('deadline')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div class="flex flex-col">
            <label for="status" class="text-sm font-semibold text-gray-700">Status</label>
            <select type="text" wire:model="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-lg @error('status') border-red-500 @enderror">
                <option value="todo">To Do</option>
                <option value="in_progress">In Progress</option>
                <option value="done">Done</option>
            </select>
            @error('status')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Update Task
            </button>
        </div>
    </form>
</div>
