<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guard = [];  //


    public function user() {
    	return $this->belongsto(User::class, 'user_id', 'id');
    }

    public function profile() {
    	return $this->hasOneThrough(UserProfile::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }


}
