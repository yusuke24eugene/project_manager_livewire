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
                                {{ $project->start }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('projects.show', $project->id) }}" class="block w-full h-full">
                                {{ $project->deadline }}
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
