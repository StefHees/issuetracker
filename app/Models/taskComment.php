<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskComment extends Model
{
    protected $fillable = [
        'task_id', 'comment_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
