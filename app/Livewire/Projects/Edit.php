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

    #[Rule('required|date')]
    public $start;

    #[Rule('required|date')]
    public $deadline;

    #[Rule('required|in:todo,in_progress,done')]
    public string $status;

    public function mount($id)
    {
        $project = project::findOrFail($id);

        $this->id = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->start = $project->start;
        $this->deadline = $project->deadline;
        $this->status = $project->status;
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
        ]);

        $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.projects.edit');
    }
}
