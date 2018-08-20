<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'attachment', 'parent_id', 'user_id, task_id'];


    protected $dates = ['created_at', 'updated_at'];

    public function replies()

    {

        return $this->hasMany(Comment::class,'id','reply_id');

    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // gives back the parent of a comment (does not determine if it IS a parent)
    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'id');
    }

    // gives the children of a comment (if it has children)
    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
