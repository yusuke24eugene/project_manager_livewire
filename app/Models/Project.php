<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
Use App\Models\User;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'start', 'deadline', 'user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
