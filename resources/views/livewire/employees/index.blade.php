<div>
    <div>
        <h2 class="text-xl font-bold mb-4">Employees List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Position</th>
                    <th class="px-4 py-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="border-t hover:bg-gray-100 cursor-pointer text-center">
                        <td class="px-4 py-2 border">
                            <a href="{{ route('employees.show', $employee->id) }}" class="block w-full h-full">
                                {{ $employee->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('employees.show', $employee->id) }}" class="block w-full h-full">
                                {{ $employee->position }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('employees.show', $employee->id) }}" class="block w-full h-full">
                                {{ $employee->status }}
                            </a>
                        </td>
                    </tr>
                @endforeach

                <!-- Livewire Pagination links -->
                <div class="mb-4">
                    {{ $employees->links() }}
                </div>
            </tbody>
        </table>
    </div>
</div>
