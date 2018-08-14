<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'progress', 'start_date', 'end_date',
        'estimation' , 'priority', 'status_id', 'task_id', 'client_id', 'type_id',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Task', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Task', 'task_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

}
