<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use \DB;

class post extends Model
{
    protected $table = "posts";

    public function getPosts() {
        return DB::table($this->table)->get();
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Models\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Models\category','category_posts')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Models\like');
    }
}
