<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
     #[Rule('required|string|min:3|max:50')]
    public $name;

    #[Rule('required|string|min:3|max:500')]
    public $position;

    #[Rule('required|in:Contractual,Regular,Resigned,AWOL')]
    public $status;

    public function save()
    {
        $this->validate();
        
        $userId = Auth::id();

        Employee::create([
            'user_id' => $userId,
            'name' => $this->name,
            'position' => $this->position,
            'status' => $this->status,
        ]);

        $this->redirect('/employees', navigate: true);
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
