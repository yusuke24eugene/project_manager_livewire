<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Show extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Project::with('user')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.projects.show');
    }
}
