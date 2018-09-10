<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public function permissions()
    {
    	return $this->belongsToMany('App\Models\permission');
    }
}
