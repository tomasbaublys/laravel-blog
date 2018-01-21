<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Illuminate\Database\Eloquent\Builder
    public function scopeIncomplete($labas)
    {
    	return $labas->where('complete', 0);
    }
}
