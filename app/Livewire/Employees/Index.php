<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;

class Index extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = auth()->user()->employees;
    }

    public function render()
    {
        return view('livewire.employees.index');
    }
}
