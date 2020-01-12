<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class UserProfile extends Model
{

    use SoftDeletes;

    protected $guard = [];  //



    public function user() {
    	return $this->belongsTo(User::class);
    }
}
