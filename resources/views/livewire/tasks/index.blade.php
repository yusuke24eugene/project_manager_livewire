<div>
    <div>
        <h2 class="text-xl font-bold mb-4">Tasks List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Project</th>
                    <th class="px-4 py-2 border">Employee</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Date of Start</th>
                    <th class="px-4 py-2 border">Deadline</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Progress(%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    @php
                        $project = $projects->firstWhere('id', $task->project_id);
                        $employee = $employees->firstWhere('id', $task->employee_id);
                    @endphp
                    <tr class="border-t hover:bg-gray-100 cursor-pointer text-center">
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ $project->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ $employee->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ $task->description }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ \Carbon\Carbon::parse($task->start)->format('F d, Y') }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ \Carbon\Carbon::parse($task->deadline)->format('F d, Y') }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                @if ($task->status === 'todo')
                                    <span class="text-gray-500">To Do</span>
                                @elseif ($task->status === 'in_progress')
                                    <span class="text-blue-500">In Progress</span>
                                @elseif ($task->status === 'done')
                                    <span class="text-green-600 font-semibold">Done</span>
                                @else
                                    <span class="text-red-500">Unknown</span>
                                @endif
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('tasks.show', $task->id) }}" class="block w-full h-full">
                                {{ $task->progress }}%
                            </a>
                        </td>
                    </tr>
                @endforeach

                <!-- Livewire Pagination links -->
                <div class="mb-4">
                    {{ $tasks->links() }}
                </div>
            </tbody>
        </table>
    </div>
</div>
