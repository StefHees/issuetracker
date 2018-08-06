<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'progress', 'start_date', 'end_date',
        'estimation' , 'priority', 'issue_id', 'status_id', 'task_id',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

}
