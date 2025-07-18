<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $projects = auth()->user()->projects()
            ->orderByRaw("FIELD(status, 'todo', 'in_progress', 'done')")
            ->paginate(10);
        
        return view('livewire.projects.index', compact('projects'));
    }
}
