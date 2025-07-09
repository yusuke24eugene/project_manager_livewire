<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $id;

    #[Rule('required|string|min:3|max:50')]
    public $name;

    #[Rule('required|string|min:3|max:500')]
    public $position;

    #[Rule('required|in:Contractual,Regular,Resigned,AWOL')]
    public $status;

    public function mount($id)
    {
        $employee = Employee::findOrFail($id);

        $this->id = $employee->id;
        $this->name = $employee->name;
        $this->position = $employee->position;
        $this->status = $employee->status;
    }

    public function update()
    {
        $this->validate();

        $project = Employee::findOrFail($this->id);
        $project->update([
            'name' => $this->name,
            'position' => $this->position,
            'status' => $this->status,
        ]);

        $this->redirect('/employees', navigate: true);
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
