<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'attachment', 'reply_id', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function replies()

    {

        return $this->hasMany(Comment::class,'id','reply_id');

    }
}
