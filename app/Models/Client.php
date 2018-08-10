<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'address', 'phone_number', 'email',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
