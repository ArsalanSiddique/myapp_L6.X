<?php

namespace App;

use App\User;
use App\Category;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];  //


    public function user() {
    	return $this->belongsto(User::class, 'user_id', 'id');
    }

    public function profile() {
    	return $this->hasOneThrough(UserProfile::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    public function categories() {
    	return $this->belongstoMany(Category::class, 'categories_post', 'post_id', 'category_id', 'id', 'id');   	
    }

    public function setSlugAttribute($val) {
    	$slug = trim(preg_replace("/[^\w\d]+/i", "-", $val), "-");
    	$count = Post::where('slug', 'like', "%{$slug}%")->count();
    	if($count>0)
    		$slug = $slug."-".($count+1);

    	$this->attributes['slug'] =  strtolower($slug);
    }

    public function getSlugAttribute($val) {
    	if($val == null) {
    		return $this->id;	
    	}
    	return $val;
    }

}
