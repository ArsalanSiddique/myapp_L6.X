<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
	
    public function users() {
    	return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }

    public function roles() {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public function setNameAttribute($val) {
    	$val = strtolower($val);
    	return $val;
    }

    public function getNameAttribute($val) {
    	$val = strtolower($val);
    	return $val;
    }
}
