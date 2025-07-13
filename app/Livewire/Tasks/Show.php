<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class Show extends Component
{
    public $task;
    public $employee;
    public $project;

    public function delete(Task $task)
    {
        $task->delete();

        $this->redirect('/tasks', navigate: true);
    }

    public function mount($id)
    {
        $this->task = Task::with('user')->findOrFail($id);

        $projectId = $this->task->project_id;
        $this->project = auth()->user()->projects->firstWhere('id', $projectId);

        $employeeId = $this->task->employee_id;
        $this->employee = auth()->user()->employees->firstWhere('id', $employeeId);
    }

    public function render()
    {
        return view('livewire.tasks.show');
    }
}
