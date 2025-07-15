<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Employee;
use App\Models\User;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'start', 'deadline', 'status', 'project_id', 'employee_id', 'user_id', 'progress'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
