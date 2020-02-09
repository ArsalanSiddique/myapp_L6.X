<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('isAllowed', function($user, $allowed) {
            
        //     $allowed = explode(":", $allowed);
        //     // dd($allowed);
        //     $roles = $user->roles->pluck('name')->toArray();
        //     // dd($allowed->all());
        //     $result =  array_intersect($allowed, $roles);
        //     if($result == true)
        //         return true;
        //     else
        //         return Response::deny('You must be a super administrator.');
        // });
        // Gate::define('updatePost', function($user, $author_id) {
        //     // The user of the post can update the post...
        //     return $user->id === $author_id;
        // });

        Gate::define("isAllowed", "App\Gates\PostGates@allowed_users");
        // Gate::define("updatePost", "App\Gates\PostGates@allow_editings");
        // Gate::define("deletePost", "App\Gates\PostGates@allow_deleting");
        // Gate::define("createPost", "App\Gates\PostGates@allow_creating");


    }
}
