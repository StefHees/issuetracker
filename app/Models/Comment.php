<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'attachment', 'parent_id', 'user_id, task_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function replies()

    {

        return $this->hasMany(Comment::class,'id','reply_id');

    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
