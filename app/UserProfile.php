<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Country;

class UserProfile extends Model
{

    use SoftDeletes;

    protected $guarded = [];  //



    public function user() {
    	return $this->belongsTo(User::class);
    }

	public function country() {
    	return $this->hasOne(country::class, 'id', 'user_id' );
    }
}
