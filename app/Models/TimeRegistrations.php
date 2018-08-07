<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeRegistrations extends Model
{
    protected $fillable = [
        'user_id', 'task_id', 'time_in_minutes', 'remarks',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
