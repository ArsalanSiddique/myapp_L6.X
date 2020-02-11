<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id;
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        $admin = $user->roles->where('name', 'admin')->first()->name;
        $loged_in_user = $user->roles->first()->name;

        // if($admin == true) {
        //     // Response::allow();
        //     return true;
        // }else {
        //     // Response::deny("You are not authorize to create new post");   
        //     return false;
        // }
        if($loged_in_user === 'admin') {
            return true;
        }else {
            return false;
        }
        // return $user->roles->first()->name === $admin ? Response::allow() : Response::deny("You are not authorize to create new post");
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id ? $this->allow() : $this->deny("You are not authorize to edit this post");
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id ? $this->allow() : $this->deny("You are not authorize to delete this post");
     

        // $roles = $user->roles->pluck('name')->toArray();
        // return $user->id === $post->user_id || in_array('admin', $roles) ? Response::allow() : Response::deny("You are not authorize to delete this post");


        // $roles = $user->roles->pluck('name')->toArray();
        // return $user->id === $post->user_id || in_array('admin', $roles) ? Response::allow() : Response::deny("You are not authorize to delete this post");

    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }


    public function before(User $user) {
        $admin = $user->roles->where('name', 'admin')->first();
        return $admin ? true : null;
    }

}
