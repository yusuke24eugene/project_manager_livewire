<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $tasks;
    public $employees;
    public $projects;

    public function mount()
    {
        $userId = Auth::id();
        $this->tasks = Task::where('user_id', $userId)->get();
        $this->projects = auth()->user()->projects;
        $this->employees = auth()->user()->employees;
    }

    public function render()
    {
        return view('livewire.tasks.index');
    }
}
