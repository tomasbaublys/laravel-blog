<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Using local scope
    public function scopeIncomplete($query)
    {
    	return $query->where('complete', 0);
    }

}

