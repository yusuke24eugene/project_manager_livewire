<div>
    <div>
        <h2 class="text-xl font-bold mb-4">Projects List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Date of Start</th>
                    <th class="px-4 py-2 border">Deadline</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Progress(%)</th>
                    <th class="px-4 py-2 border">Tasks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="border-t hover:bg-gray-100 cursor-pointer text-center">
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ $project->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ $project->description }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ \Carbon\Carbon::parse($project->start)->format('F d, Y') }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ \Carbon\Carbon::parse($project->deadline)->format('F d, Y') }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                @if ($project->status === 'todo')
                                    <span class="text-gray-500">To Do</span>
                                @elseif ($project->status === 'in_progress')
                                    <span class="text-blue-500">In Progress</span>
                                @elseif ($project->status === 'done')
                                    <span class="text-green-600 font-semibold">Done</span>
                                @else
                                    <span class="text-red-500">Unknown</span>
                                @endif
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-teal-600">
                                            {{ $project->progress }}%
                                        </span>
                                    </div>
                                    <div class="flex mb-2 items-center justify-between">
                                        <div class="w-full bg-gray-200 rounded-full">
                                            <div class="bg-teal-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{ $project->progress }}%">
                                                {{-- The progress percentage text is centered inside the bar --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ $project->tasks()->count(); }}
                            </a>
                        </td>
                    </tr>
                @endforeach

                <!-- Livewire Pagination links -->
                <div class="mb-4">
                    {{ $projects->links() }}
                </div>
            </tbody>
        </table>
    </div>
</div>
