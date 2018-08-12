<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TimeRegistrations extends Model
{
    protected $fillable = [
        'user_id', 'task_id', 'time_in_minutes', 'remarks',
    ];

    public function user()
    {
        //return $this->belongsTo(User::class, user_id);
        return $this->belongsTo(User::class);
    }

    public function task(){
        //return $this->belongsTo(Task::class, task_id);
        return $this->belongsTo(Task::class);
    }
}
