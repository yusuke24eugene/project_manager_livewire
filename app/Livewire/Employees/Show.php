<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;

class Show extends Component
{
    public $employee;

    public function delete(Employee $employee)
    {
        $employee->delete();

        $this->redirect('/employees', navigate: true);
    }

    public function mount($id)
    {
        $this->employee = Employee::with('user')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.employees.show');
    }
}
