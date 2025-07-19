<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $id;

    #[Rule('required|string|min:3|max:50')]
    public $name;

    #[Rule('required|string|min:3|max:500')]
    public $description;

    #[Rule('date')]
    public $start;

    #[Rule('date|after_or_equal:start')]
    public $deadline;

    #[Rule('required|in:todo,in_progress,done')]
    public string $status;

    #[Rule('required|integer|min:0|max:100')]
    public $progress;

    public function mount($id)
    {
        $project = Project::findOrFail($id);

        $this->id = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->start = $project->start;
        $this->deadline = $project->deadline;
        $this->status = $project->status;
        $this->progress = $project->progress;
    }

    public function update()
    {
        $this->validate();

        $project = Project::findOrFail($this->id);
        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'start' => $this->start,
            'deadline' => $this->deadline,
            'status' => $this->status,
            'progress' => $this->progress
        ]);

        $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.projects.edit');
    }
}
