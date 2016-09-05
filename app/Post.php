<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 	protected $fillable = ['name','email','password'];
   	public function user()
   	{
   		return $this->belongs(Post::class);
   	}

   	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
