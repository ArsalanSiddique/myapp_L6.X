<?php

namespace App;
use App\Post;
use App\UserProfile;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guard = [];  //


    public function posts() {
    	return $this->hasManyThrough(Post::class, UserProfile::class, 'country_id', 'user_id', 'id', 'user_id');
    }


}
