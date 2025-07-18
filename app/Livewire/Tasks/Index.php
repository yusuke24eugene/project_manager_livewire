<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $userId = Auth::id();

        $tasks = Task::where('user_id', $userId)
            ->orderByRaw("FIELD(status, 'todo', 'in_progress', 'done')")
            ->paginate(10);

        $projects = auth()->user()->projects;
        $employees = auth()->user()->employees;

        return view('livewire.tasks.index', compact(['tasks', 'projects', 'employees']));
    }
}
