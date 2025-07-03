<div>
    <div>
    <h2 class="text-xl font-bold mb-4">Projects List</h2>
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Description</th>
                <th class="px-4 py-2 border">Date of Start</th>
                <th class="px-4 py-2 border">Deadline</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="border-t">
                    <td class="px-4 py-2 border">{{ $project->id }}</td>
                    <td class="px-4 py-2 border">{{ $project->name }}</td>
                    <td class="px-4 py-2 border">{{ $project->description }}</td>
                    <td class="px-4 py-2 border">{{ $project->start }}</td>
                    <td class="px-4 py-2 border">{{ $project->deadline }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
