<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Issue extends Model
{

    protected $fillable = [
        'title', 'type', 'description', 'client_id'
    ];

    /*public function users(){
        return $this->belongsToMany(User::class);
    }*/

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /*
    public function status(){
        return $this->hasOne(Status::class);
    }
    */
}
