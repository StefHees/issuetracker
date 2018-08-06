<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Status extends Model
{

    protected $fillable = [
        'status_name', 'status_description', 'dashboard_color_hex', 'dashboard_order',
    ];

    public function tasks()
    {
        return $this->hasmany(Task::class);
    }
}
