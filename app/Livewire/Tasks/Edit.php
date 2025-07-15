<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Project;
use App\Models\Employee;
Use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $id;

    #[Rule('required|string|min:3|max:50')]
    public $title;

    #[Rule('required|string|min:3|max:500')]
    public $description;

    #[Rule('required|date|after_or_equal:today')]
    public $start;

    #[Rule('required|date|after_or_equal:today|after_or_equal:start')]
    public $deadline;

    #[Rule('required')]
    public $employeeId;

    #[Rule('required')]
    public $projectId;

    #[Rule('required|in:todo,in_progress,done')]
    public string $status;

    #[Rule('required|integer|min:0|max:100')]
    public $progress;

    public $employees;
    public $projects;

    public $employeeName;
    public $projectName;

    public function mount($id)
    {
        $userId = Auth::id();
        $this->projects = Project::where('user_id', $userId)->get();
        $this->employees = Employee::where('user_id', $userId)->get();

        $task = Task::findOrFail($id);

        $this->id = $task->id;
        $this->title = $task->title;
        $this->employeeId = $task->employee_id;
        $this->projectId = $task->project_id;
        $this->description = $task->description;
        $this->start = $task->start;
        $this->deadline = $task->deadline;
        $this->status = $task->status;
        $this->progress = $task->progress;
        
        $this->projectName = $this->projects->firstWhere('id', $this->projectId)->name;
        $this->employeeName = $this->employees->firstWhere('id', $this->employeeId)->name;
    }

    public function update()
    {
        $this->validate();

        $project = Task::findOrFail($this->id);
        $project->update([
            'title' => $this->title,
            'project_id' => $this->projectId,
            'employee_id' => $this->employeeId,
            'description' => $this->description,
            'start' => $this->start,
            'deadline' => $this->deadline,
            'status' => $this->status,
            'progress' => $this->progress
        ]);

        $this->redirect('/tasks', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.tasks.edit');
    }
}
