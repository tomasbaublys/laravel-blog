<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
    	$user_id = auth()->id();

        $this->comments()->create(compact('body', 'user_id'));
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month'])) {
            if ($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }
        if(isset($filters['year'])) {
            if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
            }
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(`created_at`) year, monthname(`created_at`) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
