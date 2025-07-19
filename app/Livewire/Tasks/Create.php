<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Project;
use App\Models\Employee;
Use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    #[Rule('required|string|min:3|max:50')]
    public $title;

    #[Rule('required|string|min:3|max:500')]
    public $description;

    #[Rule('required|date|after_or_equal:today')]
    public $start;

    #[Rule('required|date|after_or_equal:today|after_or_equal:start')]
    public $deadline;

    #[Rule('required|integer|min:1')]
    public $employeeId;

    #[Rule('required|integer|min:1')]
    public $projectId;

    public $employees;
    public $projects;

    public function mount()
    {
        $userId = Auth::id();
        $this->projects = Project::where('user_id', $userId)->get();
        $this->employees = Employee::where('user_id', $userId)->get();
    }

    public function save()
    {
        $this->validate();
        
        $userId = Auth::id();

        Task::create([
            'user_id' => $userId,
            'title' => $this->title,
            'description' => $this->description,
            'start' => $this->start,
            'deadline' => $this->deadline,
            'employee_id' => $this->employeeId,
            'project_id' => $this->projectId
        ]);

        $this->redirect('/tasks', navigate: true);
    }

    public function render()
    {
        return view('livewire.tasks.create');
    }
}
