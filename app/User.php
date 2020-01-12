<?php

namespace App;
use App\Scopes\NotVerifiedUsers;
use App\Scopes\VerifiedUsers;
use App\UserProfile;
use App\Post;
use App\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    // protected $table = "user";  //changed table name users to user
    // protected $primaryKey = 'email';    // cahnged P.K from id to email




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /** Global scope
    **  $user->withoutGlobalScopes()->get();
    **  $user->withoutGlobalScope(App\Scope\VerifiedUsers::class)->get();
    *
    * public static function boot() {
    *     parent::boot();
    *     static::addGlobalScope('vfu', function (Builder $builder) {
    *         return $builder->where('email_verified_at', '<>', null);
    *     });

    *     static::addGlobalScope('nvfu', function (Builder $builder) {
    *         return $builder->where('email_verified_at', '=', null);
    *     });
    * }

    //  ===================================================
    * public static function boot() {
    *     parent::boot();
    *     static::addGlobalScope(new VerifiedUsers);
    *     static::addGlobalScope(new NotVerifiedUsers);
    * }
    **/



    //  ================ local scope
    // $user->ById(1)->get();
    public function scopeById($query, $id) {
        return $query->where('id', $id);
    }

    public function scopeVfu($query) {
        return $query->where('email_verified_at', '<>', null);
    }

    public function scopeNvfu($query) {
        return $query->where('email_verified_at', '=', null);
    }


    // ==================== ORM Relationship
    // One to One Realation

    public function profile() {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
        // ===Syntax return $query->hasOne('MODELNAME::class', 'FOREIGN KEY', 'PRIMARY KEY');
    }

    // One to Many Realation
    public function post() {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function roles() {
        // pivot table <=> role_id, user_id
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

 }
