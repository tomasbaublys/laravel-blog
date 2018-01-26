<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
    }
}
