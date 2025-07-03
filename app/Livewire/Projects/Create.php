<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    #[Rule('required|string|min:3|max:50')]
    public $name;

    #[Rule('required|string|min:3|max:500')]
    public $description;

    #[Rule('required|date')]
    public $start;

    #[Rule('required|date')]
    public $deadline;

    public function save()
    {
        $this->validate();
        
        $userId = Auth::id();

        Project::create([
            'user_id' => $userId,
            'name' => $this->name,
            'description' => $this->description,
            'start' => $this->start,
            'deadline' => $this->deadline
        ]);

        $this->reset();

        session()->flash('message', 'Record successfully created!');
    }

    public function render()
    {
        return view('livewire.projects.create');
    }
}
