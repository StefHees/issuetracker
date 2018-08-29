<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    private $user;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar', 'hourly_rate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isAgent()
    {
        return $this->hasRole('agent');
    }

    public function isAdminOrAgent()
    {
        if($this->hasRole('agent')) {
            return TRUE;
        } elseif ($this->hasRole('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function hasRole($role) {
        if (Auth::user()->role == strtolower($role)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tasks() {
        $this->hasMany(Task::class);
    }

    public function comments() {
        $this->hasMany(Comment::class);
    }

}
