<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $employees = auth()->user()->employees()
            ->orderByRaw("FIELD(status, 'Regular', 'Contractual', 'Resigned', 'AWOL')")
            ->paginate(10);

        return view('livewire.employees.index', compact('employees'));
    }
}
