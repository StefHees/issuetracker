<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'progress', 'start_date', 'end_date',
        'estimation' , 'priority', 'issue_id', 'status_id', 'parent_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'id','reply_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

}
